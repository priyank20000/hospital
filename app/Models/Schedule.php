<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'dr_id',
        'day',
        'start_time',
        'end_time'
    ];

    // Accessor to format time in 12-hour with AM/PM
    public function getStartTimeAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('g:iA');
    }

    // Accessor to format time in 12-hour with AM/PM
    public function getEndTimeAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('g:iA');
    }

}
