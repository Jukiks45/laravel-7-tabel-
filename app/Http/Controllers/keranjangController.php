<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\Laptopdijual;
use Illuminate\Http\Request;

class keranjangController extends Controller
{

    public function index()
    {
        $data = keranjang::all();
        return view('user.keranjang.keranjang',compact('data'));
    }

    public function store(Request $request,$id)
    {
        $data = Laptopdijual::find($id);
        // dd($data);
        $datak = keranjang::where('id_merk','=',$data->id_merk)->First();
        // foreach ($data as $key => $value) {
        if(is_null($datak)){
            // keranjang::create([
            //     'id_merk' => $value->id_merk,
            //     'processor' => $value->processor,
            //     'ram' => $value->ram,
            //     'vga' => $value->vga,
            //     'harga' => $value->harga,
            // ]);
            keranjang::create([
                'id_merk' => $data->id_merk,
                'processor' => $data->processor,
                'ram' => $data->ram,
                'vga' => $data->vga,
                'harga' => $data->harga,
            ]);
        }else{
            return back()->with('error','laptop sudah ada dikeranjang');
        }
        // }
        return redirect('laptopdijualuser')->with('success','Laptop berhasil ditambahkan ke keranjang');
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $data = keranjang::find($id);
        $data->delete();
        return redirect('/keranjang')->with('success','berhasil dihapus');
    }
}
