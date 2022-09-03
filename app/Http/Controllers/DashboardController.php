<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\data_pembeli;
use App\Models\Employee;
use App\Models\Laptopdijual;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $pembeli = data_pembeli::count();
        $karyawan = karyawan::count();
        $laptop = Employee::count();
        $data = Laptopdijual::with('stockem','stock')->get();
        return view('dashboard',compact('karyawan','pembeli','data','laptop'));
    }

    public function dashboarduser(){
        return view('dashboarduser');
    }
}


