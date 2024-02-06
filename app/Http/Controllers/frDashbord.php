<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frDashbord extends Controller
{
    public function FrDashboard(){
        return view('farmasy_dashboard.hi');
    }
}
