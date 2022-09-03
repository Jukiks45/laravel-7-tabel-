<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function datakaryawan(){
        $data = karyawan::all();
        return view('datakaryawan',compact('data'));
    }

    public function datakaryawanform(){
        return view('datakaryawanform');
    }

    public function datakaryawanpost(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'nama' => 'required',
            'foto' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'kota' => 'required',
            'jalan' => 'required',
            'notelepon' => 'required',
        ]);
        $data = karyawan::create([
            'nama' => $request->nama,
            'foto' => $request->foto,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'kota' => $request->kota,
            'jalan' => $request->jalan,
            'notelepon' => $request->notelepon,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('datakaryawan')->with('success','data succes ditambah');
    }

    public function editkaryawanform($id)
    {
        $data = karyawan::find($id);
        return view('editkaryawanform',compact('data'));
    }

    public function editkaryawanupdate(Request $request, $id){
        $data = karyawan::find($id);
        $data->update([
            'nama' => $request->nama,
            // 'foto' => $request->foto,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'kota' => $request->kota,
            'jalan' => $request->jalan,
            'notelepon' => $request->notelepon,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('datakaryawan')->with('success','data succes diupdate');
    }

    public function deletekaryawan($id){
        $data = karyawan::find($id);
        $data->delete();
        return redirect('datakaryawan')->with('success','data succes dihapus');
    }
}
