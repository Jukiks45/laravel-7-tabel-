<?php

namespace App\Models;

use App\Models\Supplier;
use Laravel\Sanctum\Guard;
use App\Models\Laptopdijual;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];

    public function Laptopdijual(){
        return $this->hasMany(Laptopdijual::class);
    }

    public function stocklaptop(){
        return $this->belongsTo(Supplier::class,'merk','id_supplier');
    }
}
