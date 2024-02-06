<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['supplier_id', 'medicine_name', 'packing', 'generic_name'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    protected $table = 'medicines';

}
