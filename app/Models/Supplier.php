<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_supplier';
    protected $table = 'suppliers';
    protected $guarded = [];

    public function Laptopdijual(){
        return $this->hasMany(Employee::class);
    }

    public function datastock(){
        return $this->hasMany(Laptopdijual::class);
    }

    public function supplier(){
        return $this->belongsTo(Employee::class,'merk','id');
    }
}
