<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_keranjang';
    protected $table = 'keranjang';
    protected $guarded = [];

    public function stock(){
        return $this->belongsTo(Employee::class,'id_merk','id');
    }
}
