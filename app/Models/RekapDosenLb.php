<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapDosenLb extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen_id',
        'total_sks',
        'tarif_per_sks',
        'total_honor',
        'bulan',
        'status_pembayaran',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
