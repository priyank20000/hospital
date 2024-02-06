<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'date',
        'time',

    ];
    protected $table = 'second_models';
}
