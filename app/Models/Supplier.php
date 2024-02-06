<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_name',
        'supplier_email',
        'supplier_number',
        'supplier_address',
       
        // Add other attributes as needed
    ];
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    protected $table = 'suppliers';
}
