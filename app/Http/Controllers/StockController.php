<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Stock;

class StockController extends Controller
{
    public function stock(){
        $purchaseData = Purchase::all();
        return view('medicines.medicine-stock' , compact('purchaseData'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'medicine_name' => 'required|string',
            'packing' => 'required|string',
            'batch_id' => 'required|string',
            'expiry_date' => 'required|string',
            'quantity' => 'required|integer',
            'mrp' => 'required|numeric',
            'rate' => 'required|numeric',
            'paytype' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Create a new Stock record
        $stock = Stock::create($request->all());

        return redirect()->route('stock.index')->with('success', 'Stock record created successfully');
    }

}
