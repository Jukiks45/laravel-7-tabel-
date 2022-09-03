<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laptopdijual extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function stock(){
        return $this->belongsTo(Supplier::class,'id_merk','id_supplier');
    }

    public function stockem(){
        return $this->belongsTo(Employee::class,'id_merk','id');
    }

    // public function stockram(){
    //     return $this->belongsTo(Employee::class,'id_ram','id');
    // }

    // public function stockvga(){
    //     return $this->belongsTo(Employee::class,'id_vga','id');
    // }
}
