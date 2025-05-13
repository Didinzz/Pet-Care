<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatKunjungan extends Model
{
    protected $table = 'riwayat_kunjungans';

    protected $guarded = ['id'];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
