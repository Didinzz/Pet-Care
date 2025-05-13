<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPraktik extends Model
{
    protected $table = 'jadwal_praktiks';

    protected $fillable = [
        'user_id',
        'jadwal',
        'jam_mulai',
        'jam_selesai',
    ];

    protected $casts = [
        'jadwal' => 'array',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getFormattedJadwalAttribute()
    {
        if (!$this->jadwal) {
            return '-';
        }
        
        $jadwal = is_string($this->jadwal) ? json_decode($this->jadwal, true) : $this->jadwal;
        
        if (!is_array($jadwal)) {
            return $jadwal;
        }
        
        return implode(', ', $jadwal);
    }

    public function getFormattedJamAttribute()
    {
        if (!$this->jam_mulai || !$this->jam_selesai) {
            return '-';
        }
        
        return $this->jam_mulai . ' - ' . $this->jam_selesai;
    }
}
