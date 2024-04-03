<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'info';

    protected $fillable = [
        'semester_hours',
        'semester_average',
        'cumulative_hours',
        'cumulative_average',
        'sm_success',
        'indicator',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
