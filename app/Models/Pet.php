<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';
    protected $guarded = [];


    public function owner()
    {   
        return $this->belongsTo(Owner::class);
    }

    public function riwayatKunjungan()
    {
        return $this->hasMany(RiwayatKunjungan::class);
    }
}
