<?php

namespace App\Http\Controllers;

use App\Models\Icu;
use App\Models\General;
use App\Models\Delexue;
use App\Models\Personal;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show()
    {
        $icuData = Icu::all();
        $generalData = General::all();
        $personalData = Personal::all();
        $delexueData = Delexue::all();

        return view('show', compact('icuData', 'generalData', 'personalData', 'delexueData'));
    }

    public function deleteRecord($model, $id)
    {
        // Choose the model based on the parameter
        switch ($model) {
            case 'icu':
                $record = Icu::find($id);
                break;
            case 'general':
                $record = General::find($id);
                break;
            case 'personal':
                $record = Personal::find($id);
                break;
            case 'delexue':
                $record = Delexue::find($id);
                break;
            // Add more cases if needed

            default:
                return redirect()->route('show')->with('error', 'Invalid model');
        }

        if ($record) {
            $record->delete();
            return redirect()->back()->with('success', 'Record deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Record not found');
        }
    }
}
