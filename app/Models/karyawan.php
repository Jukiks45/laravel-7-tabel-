<?php

namespace App\Models;

use App\Models\alamat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawans';
    protected $guarded = [];
    protected $dates = ['created_at'];

}
