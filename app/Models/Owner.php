<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners';
    protected $fillable = ['nama_lengkap', 'no_hp', 'alamat', 'catatan'];

    public function pets()
    {   
        return $this->hasMany(Pet::class);
    }
}
