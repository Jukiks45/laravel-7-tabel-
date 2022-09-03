<?php

namespace App\Http\Controllers;

use App\Models\checkout;
use App\Models\data_pembeli;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function index()
    {
        $data = checkout::all();
        return view('user.pengiriman.pengiriman',compact('data'));
    }


    public function create()
    {
        return view('user.pengiriman.checkout');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = checkout::create([
            'nama' => $request->nama,
            'notelepon' => $request->notelepon,
            'alamat' => $request->alamat,
            'detail' => $request->detail,
            'foto' => $request->foto,
            'status' => 'sedang dikemas',
        ]);

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('buktipembayaran/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('/pengiriman')->with('success','berhasil checkout');
    }


    public function show($id)
    {
        $data = checkout::find($id);
        $data->update(['status'=> 'Laptop diterima']);
        $pem = data_pembeli::create([
            'nama' => $data->nama,
            'notelepon' => $data->notelepon,
            'kota' => $data->alamat,
            'bangunan' => $data->detail,
            'status' => $data->status,
        ]);
        $data->delete();
        return redirect('pengiriman')->with('success','Laptop berhasil diterima');
    }


    public function edit(checkout $checkout)
    {
        //
    }


    public function update(Request $request, checkout $checkout)
    {
        //
    }

    
    public function destroy($id)
    {
        $data = checkout::find($id);
        $data->delete();
        return redirect('pengiriman')->with('success','pengiriman berhasil dihapus');
    }
}
