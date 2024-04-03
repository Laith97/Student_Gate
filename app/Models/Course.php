<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_number',
        'course_name',
        'section',
        'course_status',
        'marks',
        'final_mark',
        'hours_number',
        'student_id',
        'academic_year',
        'semester'
    ];
    

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}

