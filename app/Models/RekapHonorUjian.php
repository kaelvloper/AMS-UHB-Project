<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapHonorUjian extends Model
{
    protected $fillable = [
        'dosen_id',
        'jumlah_sesi',
        'tarif_per_sesi',
        'total_honor_ujian',
        'jenis_ujian',
        'semester',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
