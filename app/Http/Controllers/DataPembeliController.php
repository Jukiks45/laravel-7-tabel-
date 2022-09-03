<?php

namespace App\Http\Controllers;

use App\Models\alamat;
use App\Models\data_pembeli;
use App\Models\karyawan;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class DataPembeliController extends Controller
{
    public function datapembeli()
    {
        // $data = data_pembeli::with('alamat')->paginate();
        $data = data_pembeli::all();
        return view('datapembeli',compact('data'));
    }

    public function datapembeliform()
    {
        $dataalamat = alamat::all();
        return view('datapembeliform',compact('dataalamat'));
    }
    public function datapembelipost(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'kota' => 'required',
            'bangunan' => 'required',
            'notelepon' => 'required',

        ]);
        $data = data_pembeli::create($request->all());
        return redirect('laptopdijualuser')->with('success','laptop success dipesan');
    }

    public function editdatapembeli($id)
    {
        // dd($data);
        $dataalamat = alamat::all();
        $data = data_pembeli::find($id);
        return view('datapembeliupdate', compact('data','dataalamat'));
    }

    public function updatedatapembeli(Request $request, $id)
    {
        $data = data_pembeli::find($id);
        $data->update($request->all());
        return redirect('datapembeli')->with('success','Data Success iupdate');
    }

    public function deletepembeli($id)
    {
        $data = data_pembeli::find($id);
        $data->delete();
        return redirect('datapembeli')->with('success','Data success dihapus');
    }
    //relasi alamat
    public function relasialamat(){
        $data = alamat::all();
        return view('alamatpembeli',compact('data'));
    }

    public function relasialamatform(){
        return view('tambahalamatpembeli');
    }

    public function relasiformpost(Request $request){
        $data = alamat::create($request->all());
        return redirect('/relasi');
    }

    //
    public function pesananuser(){
        $data = data_pembeli::all();
        return view('user.datapembeli.datapesananuser',compact('data'));
    }
}
