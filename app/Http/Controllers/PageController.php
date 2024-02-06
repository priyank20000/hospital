<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SourceModel;
use App\Models\DestinationModel;
use App\Models\SecondModel;
use App\Models\DrProfile;
use App\Models\Schedule;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }



    public function team()
    {
        return view('team');
    }

    public function feature()
    {
        return view('feature');
    }

    public function testimonial()
    {
        return view('testimonial');
    }

    public function notFound()
    {
        return view('404');
    }

    public function contact()
    {
        return view('contact');
    }
    public function service()
    {
        return view('service');
    }

    public function appointment()
    {
        $user = Drprofile::all();
        return view('booking.appointment',compact('user'));
    }
    public function store(Request $request)
    {

        SourceModel::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'phone' => $request->input('phone'),
            'reason' => $request->input('reason'),
            'firstname'=>$request->input('firstname'),
            'services'=>$request->input('services'),


        ]);
        return redirect()->route('appointment')->with('success', 'Data entered successfully.');
    }
    public function book()
    {
        return view('booking.book');
    }
    public function checkout($id)
    {
        $sourceData = Drprofile::find($id);
        $schedules = Schedule::where(['dr_id'=>$id])->get();
        return view('booking.checkout', compact('sourceData', 'schedules'));
    }
    public function doctor_profile($id)
    {
        $user = Drprofile::find($id);
        // $user = User::find($id);
        return view('booking.doctor-profile', compact('user'));
    }
}
