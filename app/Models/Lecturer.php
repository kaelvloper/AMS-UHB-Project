<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'full_name',
        'title',
        'nidn',
        'study_program',
        'status',
        'profile_photo',
    ];
}
