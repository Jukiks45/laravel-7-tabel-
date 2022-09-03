<?php

namespace App\Http\Controllers;

use App\Models\alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function alamat(){
        $data = alamat::all();
        return view('alamatkaryawan');
    }
}
