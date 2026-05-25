<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapKegiatanUhb extends Model
{
    protected $fillable = [
        'nama_kegiatan',
        'jenis_kegiatan',
        'tanggal_kegiatan',
        'tempat',
        'status_kegiatan',
    ];
}
