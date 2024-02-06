<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;

class PurchaseController extends Controller
{
    public function purchase()
    {
        $supplierData = Supplier::all();
        $medicines = Medicine::all(); // Fetch data from the medicines table

        return view('purchase.add_purchase', compact('supplierData', 'medicines'));
    }
    public function store(Request $request){
        try{
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'medicine_name' => 'required',
            'invoice_number' => 'required',
            'paytype' => 'required|in:Cash Payment,Net Banking,Payment Due',
            'invoice_date' => 'required|date',
            'packing' => 'required', // Validate the new field 'packing'
            'batch_id' => 'required', // Validate the new field 'batch_id'
            'expiry_date' => 'required', // Validate the new field 'expiry_date'
            'quantity' => 'required|numeric', // Validate the new field 'quantity'
            'mrp' => 'required|numeric', // Validate the new field 'mrp'
            'rate' => 'required|numeric', // Validate the new field 'rate'
            'amount' => 'required|numeric', // Validate the new field 'amount'

        ]);

        $purchase = new Purchase();
        $purchase->supplier_id = $request->input('supplier_id');
        $purchase->medicine_name = $request->input('medicine_name'); // Change from 'medicine_id' to 'medicine_name'
        $purchase->invoice_number = $request->input('invoice_number');
        $purchase->paytype = $request->input('paytype');
        $purchase->invoice_date = $request->input('invoice_date');
        $purchase->packing = $request->input('packing'); // Store the new field 'packing'
        $purchase->batch_id = $request->input('batch_id'); // Store the new field 'batch_id'
        $purchase->expiry_date = $request->input('expiry_date'); // Store the new field 'expiry_date'
        $purchase->quantity = $request->input('quantity'); // Store the new field 'quantity'
        $purchase->mrp = $request->input('mrp'); // Store the new field 'mrp'
        $purchase->rate = $request->input('rate'); // Store the new field 'rate'
        $purchase->amount = $request->input('amount'); // Store the new field 'amount'
        // Add other fields as needed
        $purchase->save();

        return redirect()->back()->with('success', 'Purchase record added successfully');
    } catch (\Exception $e) {
        // If an exception occurs, handle the error
        return redirect()->back()->with('error', 'Error adding purchase record: ' . $e->getMessage());
    }
    }
    public function purchaseshow()
    {
        $sourceData = Purchase::with('supplier')->get();
        
        return view('purchase.manage_purchase', compact('sourceData'));
    }
    public function searchMedicines(Request $request)
    {
        // Retrieve the search parameters from the request
        $supplierName = $request->input('supplier_name');
        $invoiceNumber = $request->input('invoice_number');
        $invoiceDate = $request->input('invoice_date');
        $paymentStatus = $request->input('paytype');

        // Build the query based on the search parameters
        $query = Purchase::query();

        if ($supplierName) {
            $query->whereHas('supplier', function ($query) use ($supplierName) {
                $query->where('supplier_name', 'like', '%' . $supplierName . '%');
            });
        }

        if ($invoiceNumber) {
            $query->where('invoice_number', 'like', '%' . $invoiceNumber . '%');
        }

        if ($invoiceDate) {
            $query->whereDate('invoice_date', $invoiceDate);
        }

        if ($paymentStatus) {
            $query->where('paytype', $paymentStatus);
        }

        // Execute the query
        $sourceData = $query->get();

        // Return the view with the filtered data
        return view('purchase.manage_purchase', compact('sourceData'));
    }
}
