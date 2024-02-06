<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function create()
    {
        return view('patients.impatient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_relationship' => 'required|string|max:255',
            'emergency_contact_number' => 'required|string|max:15',
            'medical_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'known_medical_conditions' => 'nullable|string',
            'insurance_provider' => 'nullable|string|max:255',
            'policy_number' => 'nullable|string|max:255',
            'emergency_contact_insurance' => 'nullable|string|max:255',
            'primary_care_physician_name' => 'nullable|string|max:255',
            'primary_care_physician_contact' => 'nullable|string|max:15',
            'reason_for_admission' => 'nullable|string',
        ]);

        // Create a new patient record
        Patient::create($validatedData);

        // Redirect to the form with a success message
        return redirect()->back()->with('success', 'Patient admitted successfully!');
    }
}
