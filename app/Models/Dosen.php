<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nidn',
        'nama',
        'gelar',
        'program_studi',
        'jabatan_akademik',
        'status',
        'status_aktif',
        'foto',
    ];

    public function getNamaLengkapAttribute()
    {
        return $this->nama . ($this->gelar ? ', ' . $this->gelar : '');
    }
}
