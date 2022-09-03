<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\keranjang;
use App\Models\Laptopdijual;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function datalaptop()
    {
        $data = Employee::all();
        return view('datatokolaptop',compact('data'));
    }
    public function tambahlaptop()
    {
        $data = Supplier::all();
        $datas = Employee::with('stocklaptop')->get();
        return view('tambahdatastock',compact('data','datas'));
    }

    public function insertdata(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'merk' => 'required',
            'processor' => 'required',
            'ram' => 'required',
            'VGA' => 'required',
            'harga_jual' => 'required',
            'foto' => 'required|mimes:jpg,png,webp',
        ]);
        $rp =['Rp.','.'];
        $data = Employee::create([
            'merk' => $request->merk,
            // 'processor' => implode(',', $request->processor),
            'processor' => $request->processor,
            'ram' => $request->ram,
            'VGA' => $request->VGA,
            'stock' => 0,
            'harga_jual' => str_replace($rp,'',$request->harga_jual) ,
            'foto' => $request->foto,
        ]);
        // $datas = Supplier::find($request->merk);
        // $datas->stock -= $request->stock;
        // $datas->save();
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('stocklaptop')->with('success', 'Data succes ditambah');
    }

    public function tampilkandata($id)
    {
        // dd($data);
        $data = Employee::findOrfail($id);
        return view('tampildata', compact('data'));
    }

    public function editdatastockform($id)
    {
        // dd($data);
        $data = Employee::findorfail($id);
        return view('editdatastockform', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update([
            'merk' => $request->merk,
            'processor' => implode(',', $request->processor),
            'ram' => $request->ram,
            'VGA' => $request->VGA,
            'stock' => $request->stock,
            // 'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('stocklaptop')->with('success', 'Data succes diupdate');
    }

    public function delete($id)
    {
        $hitunga = Laptopdijual::where('id_merk',$id)->count();
        $hitung = Supplier::where('merk',$id)->count();
        $hitungan = keranjang::where('id_merk',$id)->count();
        if($hitung > 0){
            return back()->with('info','Data masih terelasi ke supplier');
        }elseif($hitunga > 0){
            return back()->with('info','Data masih terelasi ke laptopdijual');
        }elseif($hitungan > 0){
            return back()->with('info','Data masih terelasi ke keranjang');
        }
        else{
        $data = Employee::find($id);
        $data->delete();
        }
        return redirect()->route('stocklaptop')->with('success', 'Data succes hapus');
    }

    // controller project2


    public function landingpage()
    {
        return view('landingpage');
    }

    public function stocklaptop()
    {
        $data = Employee::all();
        return view('stocklaptop', compact('data'));
    }

 }

