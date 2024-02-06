<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use App\Models\Icu; // Import the Icu model
use App\Models\General;
use App\Models\Delexue;
use App\Models\Personal;

class BookingController extends Controller
{
    public function index()
    {
        // Retrieve data for the table
        $formData = Icu::latest()->get();

        // Default values for cost
        $remainingSpaceOption1 = 0;
        $remainingSpaceOption2 = 0;
        $cost = 0;

        // Calculate remaining space for Option 1
// Calculate remaining space for Option 1 (ICU)
$option1Model = new Icu();
if ($option1Model->exists()) {
    $option1Count = $option1Model->count();
    $option1Limit = 20;
    $remainingSpaceOption1 = max(0, $option1Limit - $option1Count);
}

// Calculate remaining space for Option 2 (Delexue)
$option2Model = new Delexue();
if ($option2Model->exists()) {
    $option2Count = $option2Model->count();
    $option2Limit = 5;
    $remainingSpaceOption2 = max(0, $option2Limit - $option2Count);
}

// Calculate remaining space for Option 3 (Personal)
$option3Model = new Personal();

if ($option3Model->exists()) {
    $option3Count = $option3Model->count();
    $option3Limit = 5;
    $remainingSpaceOption3 = max(0, $option3Limit - $option3Count);
} else {
    $remainingSpaceOption3 = 0; // Set a default value if the model doesn't exist
}

// Calculate remaining space for Option 4 (General)
$option4Model = new General();

if ($option4Model->exists()) {
    $option4Count = $option4Model->count();
    $option4Limit = 5;
    $remainingSpaceOption4 = max(0, $option4Limit - $option4Count);
} else {
    $remainingSpaceOption4 = 0; // Set a default value if the model doesn't exist
}
return view('booking', compact('formData', 'remainingSpaceOption1', 'remainingSpaceOption2', 'remainingSpaceOption3', 'remainingSpaceOption4', 'cost'));
    }

    public function submitForm(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:20',
                'dropdown_option' => 'required|in:General,Private,Delexue,ICU', // Update with your actual options
            ]);

            // Determine the model based on the selected option
            switch ($validatedData['dropdown_option']) {
                case 'General':
                    $model = new General(); // Update with the appropriate model for General
                    $tableLimit = 5; // Set limit for Option 1
                    $roomNoRange = range(101, 105); // Range of allowed room numbers
                    $cost = 5000; // Set cost foPr Option 1
                    break;
                case 'Private':
                    $model = new Personal(); // Update with the appropriate model for General
                    $tableLimit = 5; // Set limit for Option 1
                    $roomNoRange = range(101, 105); // Range of allowed room numbers
                    $cost = 5000; // Set cost for Option 1
                    break;
                case 'Delexue':
                    $model = new Delexue(); // Update with the appropriate model for General
                    $tableLimit = 5; // Set limit for Option 1
                    $roomNoRange = range(101, 105); // Range of allowed room numbers
                    $cost = 5000; // Set cost for Option 1
                    break;
                case 'ICU':
                    $model = new Icu(); // Update with the appropriate model for Private, Delexue, ICU
                    $tableLimit = 20; // Set limit for Option 2
                    $roomNoRange = range(201, 220); // Range of allowed room numbers
                    $cost = 8000; // Set cost for Option 2
                    break;
                default:
                    $model = new Sample();
                    $tableLimit = 5; // Default limit
                    $roomNoRange = range(1, 5); // Default room number range
                    $cost = 0; // Default cost
                    break;
            }

            // Check if the table has reached the limit
            $recordCount = $model->count();

            if ($recordCount >= $tableLimit) {
                return redirect()->back()->with('error', 'Table limit reached for ' . $validatedData['dropdown_option'] . '. Cannot add more entries.');
            }

            // Assign a room number within the allowed range
            $roomNo = $this->getAvailableRoomNo($model, $roomNoRange);

            // Save the form data to the appropriate table
            $model->fill($validatedData + ['cost' => $cost, 'roomno' => $roomNo]);

            if ($model->save()) {
                // Redirect back to the form with success message
                return redirect()->back()->with('success', 'Form submitted successfully!');
            } else {
                // Log the error and redirect with an error message
                \Log::error('Error saving data: ' . print_r($model->getErrors(), true));
                return redirect()->back()->with('error', 'Error submitting form. Please try again.');
            }
        } catch (\Exception $e) {
            // Log the exception and redirect with an error message
            \Log::error('Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error submitting form. Please try again.');
        }
    }

    /**
     * Get the next available room number within the specified range.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array $roomNoRange
     * @return int
     */
    private function getAvailableRoomNo($model, $roomNoRange)
    {
        $usedRoomNos = $model->pluck('roomno')->toArray();

        foreach ($roomNoRange as $roomNo) {
            if (!in_array($roomNo, $usedRoomNos)) {
                return $roomNo;
            }
        }

        // If all room numbers are used, you may handle this case accordingly
        // For example, throw an exception or return a default value.
        return 0;
    }
}
