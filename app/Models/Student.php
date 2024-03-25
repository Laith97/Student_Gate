<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'full_name',
        'college',
        'payment_number',
        'email',
        'comments',
        'datebirth',
        'full_name_english',
        'birth_city',
        'address',
        'jordan_phone_number',
        'second_phone_number',
        'level_educational_dad',
        'level_educational_mom',
        'full_address',
        'birthday_place_en',
        'phone_number_earth',
        'known1',
        'phone_number_known1',
        'known2',
        'phone_number_known2',
        'place_address',
        'place_give',
    ];
    
}
