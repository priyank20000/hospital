<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table = 'personals';
    protected $connection = 'mysql';
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'cost',
        'roomno',
        'dropdown_option',
        // Add other columns as needed
    ];
}
