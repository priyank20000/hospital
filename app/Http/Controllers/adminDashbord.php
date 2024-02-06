<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DrProfile;
use App\Models\SourceModel;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class adminDashbord extends Controller
{
    public function AdminDashboard(){
        return view('dashboard.dashboard');
    }

    public function Tables(){
        $data = User::all();
        return view('dashboard.tables',compact('data'));
    }

    public function Billing(){
        return view('dashboard.billing');
    }


    public function User_admin(){
        $data = User::all();
        return view('dashboard.user_admin',compact('data'));
    }

    public function Profile(){
        return view('dashboard.profile');
    }

    public function appointmentD(){
        $user = Drprofile::all();
        $source = SourceModel::all();
        return view('dashboard.appointment',compact('user','source'));
    }
    public function doctor_list(){
        $user = Drprofile::all();
        return view('dashboard.doctor_list',compact('user'));
    }
    public function add_doctor(){
        $user = Drprofile::first();
        return view('dashboard.add_doctor',compact('user'));

    }
    public function patient_list(){
        $user = SourceModel::all();
        return view('dashboard.patient_list',compact('user'));
    }
    public function Drprofilee_input(Request $request){

        // Validate the incoming request data
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust this based on your image requirements
            'username' => 'required|string|max:255',
            'email' => 'string|required|max:100|unique:dr_profiles',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phonenumber' => 'nullable|string|max:20',
            'gender' => 'nullable|string|max:10',
            'dob' => 'nullable|date',
            'about_me' => 'nullable|string',
            'clinic_name' => 'nullable|string|max:255',
            'clinic_address' => 'nullable|string|max:255',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state_province' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'services' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:255',
            'degree' => 'nullable|string|max:255',
            'college_institute' => 'nullable|string|max:255',
            'year_of_completion' => 'nullable|integer|min:1901|max:2155',
            'awards' => 'nullable|string|max:255',
            'year_of_awards' => 'nullable|string|max:10',

            // 'registration_year' => 'nullable|string|max:10',
            'clinic_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = new Drprofile;


        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $user->image = $imagePath;
        }

        // Handle clinic image upload
        if ($request->hasFile('clinic_image')) {
            $clinicImagePath = $request->file('clinic_image')->store('clinic_images', 'public');
            $user->clinic_image = $clinicImagePath;
        }


        // Update user profile fields
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->phonenumber = $request->input('phonenumber');
        $user->gender = $request->input('gender');
        $user->dob = $request->input('dob');
        $user->about_me = $request->input('about_me');
        $user->clinic_name = $request->input('clinic_name');
        $user->clinic_address = $request->input('clinic_address');
        $user->address_line_1 = $request->input('address_line1');
        $user->address_line_2 = $request->input('address_line2');
        $user->city = $request->input('city');
        $user->state_province = $request->input('state_province');
        $user->country = $request->input('country');
        $user->postal_code = $request->input('postal_code');
        $user->services = $request->input('services');
        $user->salary = $request->input('salary');
        $user->degree = $request->input('degree');
        $user->college_institute = $request->input('college_institute');
        $user->year_of_completion = $request->input('year_of_completion');
        $user->awards = $request->input('awards');
        $user->year_of_awards = $request->input('year_of_awards');

        // $user->registration_year = $request->input('registration_year');

        // Save the user
        $user->save();

        // Redirect back or to a specific route
        return redirect('/admin_panal/doctor_list')->with('success', 'Profile updated successfully');


    }


}
