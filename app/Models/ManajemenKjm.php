<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManajemenKjm extends Model
{
    protected $fillable = [
        'dosen_id',
        'kontrak_sks',
        'total_sks_diambil',
        'kelebihan_sks',
        'semester',
        'status_review',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
