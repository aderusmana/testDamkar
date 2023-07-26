<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $guarded = [];


    // Definisikan relasi dengan model Absensi
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    // Definisikan relasi dengan model Jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
