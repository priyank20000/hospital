<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'date',
        'time',
        'phone',
        'reason',
        'firstname',
        'services',

    ];
    protected $table = 'source_models';
}
