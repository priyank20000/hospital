<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;

class ReportController extends Controller
{
    public function report(){
        $purchaseData = Purchase::all();
        return view('report.purchase_report' , compact('purchaseData'));
    }
}
