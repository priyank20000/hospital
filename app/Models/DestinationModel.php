<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'date',
        'time',
        'reason',
        // Add other attributes as needed
    ];
    protected $table = 'destination_models';
}
