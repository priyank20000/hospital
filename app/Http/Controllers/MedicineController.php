<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Models\Supplier;

use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function create()
    {
        $sourceData = Supplier::all();
        return view('medicines.add_medicines', compact('sourceData'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'medicine_name' => 'required',
            'packing' => 'required',
            'generic_name' => 'required',
        ]);

        Medicine::create($validatedData);

        return redirect()->route('medicine.show')->with('success', 'Medicine added successfully!');
    }

    public function medicine_show()
    {
        $sourceData = Medicine::with('supplier')->get();
        return view('medicines.show-medicines', compact('sourceData'));
    }
}
