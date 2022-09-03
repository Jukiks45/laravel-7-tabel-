<?php

namespace App\Http\Controllers;

use App\Models\checkout;
use Illuminate\Http\Request;

class CheckoutadminController extends Controller
{

    public function index()
    {
        $data = checkout::all();
        return view('admin.pengiriman.pengiriman',compact('data'));
    }

    public function store($id)
    {
        $data = checkout::find($id);
        $data->update(['status'=> 'sedang dikirim']);

        // foreach($data as $key => $value){
        //     checkout::updated([
        //         'status' => 'sedang dikirim',
        //     ]);
        // }
        return redirect('pengirimanadmin')->with('success','Laptop berhasil dikirim');
    }

    public function destroy($id)
    {
        //
    }
}
