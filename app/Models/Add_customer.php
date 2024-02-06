<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact_number',
        'address',
        'doctor_name',
        'doctor_address',
        // Add other attributes as needed
    ];
    protected $table = 'add_customers';
}
