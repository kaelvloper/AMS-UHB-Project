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
        'jabatan',
        'status',
    ];

    public function kjms()
    {
        return $this->hasMany(Kjm::class);
    }
}
