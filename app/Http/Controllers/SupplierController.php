<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Supplier;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isTrue;

class SupplierController extends Controller
{

    public function index()
    {
        $data = Supplier::with('supplier')->get();
        return view('admin.supplier.supplier', compact('data'));
    }

    public function create()
    {
        $data = Employee::all();
        return view('admin.supplier.supplierform', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'merk' => 'required',
            'processor' => 'required',
            'ram' => 'required',
            'vga' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'notelepon' => 'required',
            'harga_beli' => 'required',
            // 'foto' => 'required|mimes:jpg,png,webp',
        ]);
        //update stok barang
        // $datas = Supplier::all();
        $datas = Supplier::with('supplier')->where('merk', '=',$request->merk)->First();
        $datae = Employee::find($request->merk);
        if (is_null($datas)) {
            $harga = str_replace(['Rp','.'], "",$request->harga_beli);
            $data = Supplier::create([
                'harga_beli' => $harga * $request->stock,
                // 'harga_jual' => $request->harga_jual,
                'alamat' => $request->alamat,
                'notelepon' => $request->notelepon,
                'nama' => $request->nama,
                'merk' => $request->merk,
                'processor' => $request->processor,
                'ram' => $request->ram,
                'vga' => $request->vga,
                'stock' => $request->stock,
                'foto' => 'null',
            ]);
            $stoksekarang = $datae->stock;
            $stokupdate = $stoksekarang + $request->stock;
            $datae->update(['stock' => $stokupdate]);
        }else{
            $stoke = $datae->stock;
            $stoks = $datas->stock;
            $stokeupdate = $stoke + $request->stock;
            $stoksupdate = $stoks + $request->stock;
            $datae->update(['stock' => $stokeupdate]);
            $datas->update(['stock' => $stoksupdate]);
        }
        return redirect()->route('supplier')->with('success', 'Data succes ditambah');
    }


    public function show($id)
    {
        $data = Supplier::find($id);
        return view('admin.supplier.supplierformedit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Supplier::find($id);
        $data->update([
            'merk' => $request->merk,
            'processor' => implode(',', $request->processor),
            'ram' => $request->ram,
            'vga' => $request->vga,
            'stock' => $request->stock,
            // 'foto' => $request->foto,
        ]);
        return redirect('supplier')->with('success', 'data success diupdate');
    }


    public function destroy($id)
    {
        $data = Supplier::find($id);
        $data->delete();
        return redirect()->route('supplier')->with('success', 'Data succes hapus');
    }
}
