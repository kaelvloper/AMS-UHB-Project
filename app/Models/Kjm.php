<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kjm extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_kuliah',
        'dosen_pengampu',
        'jumlah_pertemuan',
        'is_online',
        'is_offline',
        'lampiran_count',
        'dosen_koordinator',
        'status_realisasi',
    ];
}
