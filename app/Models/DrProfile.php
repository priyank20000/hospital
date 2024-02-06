<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrProfile extends Model
{
    use HasFactory;
    // app/Models/User.php
    protected $fillable = [
        'id',
        'image',
        'username',
        'email',
        'firstname',
        'lastname',
        'phonenumber',
        'gender',
        'dob',
        'about_me',
        'clinic_name',
        'clinic_address',
        'clinic_image',
        'address_line_1',
        'address_line_2',
        'city',
        'state_province',
        'country',
        'postal_code',
        'services',
        'salary',
        'degree',
        'college_institute',
        'year_of_completion',
        'awards',
        'year_of_awards',
        'year_of_awards',


    ];

}
