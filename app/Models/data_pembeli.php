<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_pembeli extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];

    // public function alamat(){
    //     return $this->belongsTo(alamat::class,'id_alamat','id');
    // }
    public function datapembeli(){
        return $this->hasMany(Laptopdijual::class);
    }
}
