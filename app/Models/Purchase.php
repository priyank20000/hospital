<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'medicine_name',
        'invoice_number',
        'paytype',
        'invoice_date',
        'packing',
        'batch_id',
        'expiry_date',
        'quantity',
        'mrp',
        'rate',
        'amount',
    ];

    protected $table = 'purchases';

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function stock()
{
    return $this->hasOne(Stock::class, 'medicine_name', 'medicine_name');
}

protected static function boot()
{
    parent::boot();

    static::created(function ($purchase) {
        // Use the relationship to create a corresponding record in the Stock table
        $purchase->stock()->create([
            'packing' => $purchase->packing,
            'batch_id' => $purchase->batch_id,
            'expiry_date' => $purchase->expiry_date,
            'quantity' => $purchase->quantity,
            'mrp' => $purchase->mrp,
            'rate' => $purchase->rate,
            'paytype' => $purchase->paytype,
            // Add other fields as needed
        ]);
    });
}
}
