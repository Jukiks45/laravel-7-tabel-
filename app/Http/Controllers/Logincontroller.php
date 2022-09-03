<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Logincontroller extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('registrasi');
    }

    public function loginpost(Request $request){
            if (Auth::attempt($request->only('email','password'))){
                return redirect('/dashboard');
            };
            return redirect('/login')->with('failed','email atau password salah');
    }

    public function registerpost(Request $request)
    {
        // dd($request->all());
        // $messages = [
        //     'required' => ':attribute Harus di isi',
        //     'min' => ':attribute harus diisi minimal :min karakter',
        //     'unique' => 'email sudah digunakan',
        //     'email' => 'tambahkan @gmail pada email',
        // ];
        $this->validate($request,[
            'email' => 'required|email:rfc,dns|unique:users',
            'name' => 'required',
            'password' => 'required|min:8'
        ],[
            'email.required' => 'Email harus di isi',
            'email.email' => 'email yang anda masukkan tidak valdi',
            'unique' => 'email yang anda masukkan sudah digunakan',
            'name.required' => 'nama harus di isi',
            'password.required' => 'Password harus di isi',
            'password.min' => 'Password harus minimal 8 karakter',
        ]);
        User::create([
            'name' => $request->name,
            'level' => 'user',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('login');
    }

        public function logout(request $Request)
    {
        // dd($request->all());
        Auth::logout();
        return redirect('/');
    }


    // public function postlogin(Request $request)
    // {
    //     // dd($request->all());
    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         return redirect('laptopstore');
    //      }
    //     return redirect('login');
    // }

    // public function register(Request $request)
    // {
    //     // dd($request->all());
    //     return view('registrasi');
    // }

    // public function registerpost(Request $request)
    // {
    //
    // }
//     public function logout(request $Request)
//     {
//         // dd($request->all());
//         Auth::logout();
//         return redirect('/');
//     }
}

