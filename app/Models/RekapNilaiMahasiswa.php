<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapNilaiMahasiswa extends Model
{
    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'mata_kuliah',
        'kelas',
        'nilai_angka',
        'nilai_huruf',
    ];
}
