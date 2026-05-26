<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachingRecord extends Model
{
    protected $fillable = [
        'lecturer_id',
        'course_name',
        'semester',
        'date',
        'credit_hours',
        'uts_method',
        'uts_student_count',
        'uas_method',
        'uas_student_count',
        'material',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function getHonorSoalUtsAttribute()
    {
        return $this->credit_hours * 44000;
    }

    public function getHonorSoalUasAttribute()
    {
        return $this->credit_hours * 44000;
    }

    public function getHonorKoreksiUtsAttribute()
    {
        return $this->credit_hours * $this->uts_student_count * 1200;
    }

    public function getHonorKoreksiUasAttribute()
    {
        return $this->credit_hours * $this->uas_student_count * 1200;
    }

    public function getTotalHonorAttribute()
    {
        if ($this->lecturer && $this->lecturer->status === 'LB') {
            return $this->honor_soal_uts + $this->honor_soal_uas + $this->honor_koreksi_uts + $this->honor_koreksi_uas;
        }
        return 0;
    }
}
