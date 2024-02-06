<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Add_customer;

class CustomerController extends Controller
{
    public function showDataEntryPage()
    {
        $sourceData = Add_customer::all();

        return view('add_customer', ['sourceData' => $sourceData]);
    }

    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'doctor_address' => 'required|string|max:255',
        ]);

       
        Add_customer::create($validatedData);

        return redirect()->route('data-entry')->with('success', 'Data entered successfully.');
    }
    public function customerdata(){
        $sourceData = Add_customer::all();

        return view('show-data', ['sourceData' => $sourceData]);
    }

    public function edit($id){
        $student = Add_customer::find($id);
        return response()->json([
            'status'=>200,
            'student'=>$student,
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'doctor_address' => 'required|string|max:255',
        ]);
    
        $stud_id = $request->input('stud_id');
    
        $student = Add_customer::find($stud_id);
    
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
        $customer = Add_customer::find($id);
    
        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found.');
        }
    
        $customer->delete();
    
        return redirect()->back()->with('success', 'Customer deleted successfully.');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query to retrieve filtered customer data based on the search term
        $sourceData = Add_customer::where('name', 'like', '%' . $searchTerm . '%')->get();
    
        return view('show-data', ['sourceData' => $sourceData]);
    }
    
}
