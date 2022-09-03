<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class alamat extends Model
{
    use HasFactory;
    // protected $table = 'barang';
    protected $guarded = [];

    public function datapembeli(){
        return $this->hasMany(data_pembeli::class);
    }
}
