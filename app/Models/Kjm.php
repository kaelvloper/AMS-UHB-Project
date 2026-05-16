<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kjm extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_kuliah',
        'dosen_id',
        'dosen_pengampu',
        'nim',
        'jumlah_pertemuan',
        'is_online',
        'is_offline',
        'dosen_koordinator',
        'status_realisasi',
    ];

    protected $casts = [
        'is_online' => 'boolean',
        'is_offline' => 'boolean',
        'jumlah_pertemuan' => 'integer',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
