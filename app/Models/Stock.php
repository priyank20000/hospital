<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    use HasFactory; protected 
    $fillable = [
        'medicine_name',
        'packing',
        'batch_id',
        'expiry_date',
        'quantity',
        'mrp',
        'rate',
        'paytype',
        // Add other fields as needed
    ];

    

    // Define the relationship with the Stock model
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
