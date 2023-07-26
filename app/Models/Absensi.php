<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Definisikan relasi dengan model Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
