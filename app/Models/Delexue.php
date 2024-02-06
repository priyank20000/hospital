<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delexue extends Model
{
    use HasFactory;
    protected $table = 'delexues';
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
