<?php

namespace App\Http\Controllers;

use App\Models\data_pembeli;
use App\Models\Employee;
use App\Models\Laptopdijual;
use Illuminate\Http\Request;

class LaptopdijualController extends Controller
{
    public function index()
    {
        $data = Laptopdijual::with('stockem','stock')->get();
        return view('laptopdijual',compact('data'));
    }

    public function create()
    {
        $data = Employee::all();
        // $datar = Laptopdijual::with('stockprocessor','stock')->get();
        return view('laptopdijualform',compact('data'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'id_merk' => 'required',
            'harga' => 'required',

        ]);
        $datae = Employee::find($request->id_merk);
        // dd($datae);
        if($datae->stock == 0 ){
            return back()->with('error','Stock tidak tersedia');
        }else{
        $data = Laptopdijual::create([
            'id_merk' => $request->id_merk,
            'ram' => $request->ram,
            'vga' => $request->vga,
            'processor' => $request->processor,
            'harga' => str_replace(['Rp','.'],'',$request->harga),
        ]);
        $dataup = Employee::find($request->id_merk);
        $dataup->stock -= 1 ;
        $dataup->save();
        }
        return redirect('laptopdijual')->with('success','data succes dibuat');
    }


    public function show($id)
    {
        $datastock = Employee::all();
        $data = laptopdijual::find($id);
        return view('laptopdijualedit', compact('data','datastock'));
    }


    public function update(Request $request,$id)
    {
        $data = Laptopdijual::find($id);
        $data->update($request->all());
        return redirect('laptopdijual')->with('success','data success diupdate');
    }


    public function destroy($id)
    {
        $data = Laptopdijual::find($id);
        $data->delete();
        return redirect('laptopdijual')->with('success','data succes dihapus');
    }
}
