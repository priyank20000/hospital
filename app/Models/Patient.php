<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'date_of_birth',
        'gender',
        'address',
        'contact_number',
        'emergency_contact_name',
        'emergency_relationship',
        'emergency_contact_number',
        'medical_history',
        'allergies',
        'current_medications',
        'known_medical_conditions',
        'insurance_provider',
        'policy_number',
        'emergency_contact_insurance',
        'primary_care_physician_name',
        'primary_care_physician_contact',
        'reason_for_admission',
    ];
    protected $table = 'patients';

}
