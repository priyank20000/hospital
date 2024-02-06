<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrProfile;
use App\Models\Schedule;
class drDashbord extends Controller
{
    public function DrDashboard($id){
        $doctorData = DrProfile::find($id);

    // Check if the doctorData is not null before passing it to the view
        if ($doctorData) {
            return view('dr-dashboard.doctor-dashboard', compact('doctorData'));
        }
        else {
            // Handle the case when the doctor with the given ID is not found
            return abort(404);
        }
    }
    public function Drappointments($id){
        $doctorData = DrProfile::find($id);
        return view('dr-dashboard.appointments', compact('doctorData'));
    }
    public function Drpatients($id){
        $doctorData = DrProfile::find($id);
        return view('dr-dashboard.my-patients', compact('doctorData'));
    }
    public function Drschedule($id){
        $doctorData = DrProfile::find($id);
        $schedules = Schedule::where(['dr_id'=>$id])->get();
        return view('dr-dashboard.schedule-timings', compact('doctorData','schedules'));
    }
    public function store(Request $request, $id){
        // Validate the request
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'day' => 'nullable|date', // Adjusted the validation rule
            // Add other validation rules as needed
        ]);

        // Create a new Schedule model instance
        $schedule = new Schedule;

        // Set the model properties with the form data
        $schedule->start_time = $request->input('start_time');
        $schedule->end_time = $request->input('end_time');
        $schedule->day = $request->input('day');
        // Set other properties as needed
        $schedule->dr_id = $id;

        // Save the data to the database
        $schedule->save();

        $doctorData = DrProfile::find($id);
        // Redirect to the index page or show a success message
        return redirect('dr_panal/'.$doctorData->id.'/schedule')->with('success', 'Schedule created successfully.');
    }
    public function deleteSchedule($id) {
        // Find the schedule by ID and delete it
        $schedule = Schedule::find($id);
        $doctorData = DrProfile::find($id);

        // Check if the schedule exists and delete it
        if ($schedule) {
            $schedule->delete();
        }

        // Check if the DrProfile exists before accessing its properties
        if ($doctorData) {
            // You can return a response if needed
            return redirect('dr_panal/'.$doctorData->id)->with('success', 'Schedule deleted successfully.');
        } else {
            // Handle the case where DrProfile does not exist
            return redirect()->back()->with('error', 'DrProfile not found.');
        }
    }

    public function Drchangepassword($id){
        $doctorData = DrProfile::find($id);
        return view('dr-dashboard.doctor-change-password', compact('doctorData'));
    }
    public function Edit_time($id){
        $doctorData = DrProfile::find($id);
        $schedules = Schedule::all();
        return view('dr-dashboard.edit-time', compact('doctorData','schedules'));
    }

}
