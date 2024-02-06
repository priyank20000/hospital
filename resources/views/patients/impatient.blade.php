@extends('base')

@section('work')
<style>
    /* public/css/styles.css */
.my-form {
    max-width: 600px;
    margin: auto;
}

.my-form label {
    display: block;
    margin-top: 10px;
}

.my-form input,
.my-form textarea,
.my-form select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    box-sizing: border-box;
}
</style>
< <div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('patients.store') }}" class="my-form">
        @csrf

        <!-- Patient Information -->
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" required>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="contact_number">Contact Number:</label>
        <input type="tel" name="contact_number" required>

        <!-- Emergency Contact -->
        <label for="emergency_contact_name">Emergency Contact Name:</label>
        <input type="text" name="emergency_contact_name" required>

        <label for="emergency_relationship">Relationship to the Patient:</label>
        <input type="text" name="emergency_relationship" required>

        <label for="emergency_contact_number">Emergency Contact Number:</label>
        <input type="tel" name="emergency_contact_number" required>

        <!-- Medical Information -->
        <label for="medical_history">Brief Medical History:</label>
        <textarea name="medical_history"></textarea>

        <label for="allergies">Allergies:</label>
        <textarea name="allergies"></textarea>

        <label for="current_medications">Current Medications:</label>
        <textarea name="current_medications"></textarea>

        <label for="known_medical_conditions">Known Medical Conditions:</label>
        <textarea name="known_medical_conditions"></textarea>

        <!-- Reason for Admission -->
        <label for="reason_for_admission">Reason for Admission:</label>
        <textarea name="reason_for_admission"></textarea>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
