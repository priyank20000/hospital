<?php

namespace App\Http\Controllers;
use App\Models\Supplier;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function supplier_show()
    {
        return view('supplier.add_supplier');
    }
    public function supplier_store(Request $request)
    {
       
        $validatedData = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_email' => 'required|email|max:255',
            'supplier_number' => 'required|numeric|min:10',
            'supplier_address' => 'required|string|max:255',
        ]);
       
        Supplier::create($validatedData);

        return redirect()->back()->with('success', 'Data entered successfully.');
    }
    public function supplier_data(){
        $sourceData = Supplier::all();

        return view('supplier.show-supplier', ['sourceData' => $sourceData]);
    }
    public function supplier_edit($id){
        $student = Supplier::find($id);
        return response()->json([
            'status'=>200,
            'student'=>$student,
        ]);
    }
    public function update_supplier(Request $request)
    {
        $validatedData = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_number' => 'required|numeric|min:10',
            'supplier_email' =>  'required|email|max:255',
            'supplier_address' => 'required|string|max:255',
            
        ]);
    
        $stud_id = $request->input('stud_id');
    
        $student = Supplier::find($stud_id);
    
        if (!$student) {
            return response()->json([
                'status' => 404,
                'message' => 'Student not found.',
            ], 404);
        }
    
        // Update the student record
        $student->update($validatedData);
    
        return redirect()->back()->with('suucess','succesfull');
    }
    public function destroy($id)
    {
        $customer = Supplier::find($id);
    
        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found.');
        }
    
        $customer->delete();
    
        return redirect()->back()->with('success', 'Customer deleted successfully.');
    }
    public function search_supplier(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query to retrieve filtered customer data based on the search term
        $sourceData = Supplier::where('supplier_name', 'like', '%' . $searchTerm . '%')->get();
    
        return view('supplier.show-supplier', ['sourceData' => $sourceData]);
    }
}
