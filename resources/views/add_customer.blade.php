@extends('sidebar')

@section('work')

<style>
 /* Add custom styles for the form */
 form {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 }

 label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
 }

 input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ced4da;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
 }

 button {
    background-color: #3498db;
    color: #ffffff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
 }

 button:hover {
    background-color: #2980b9;
 }
</style>

<h1>Add New Customer</h1>

<form action="/data-entry" method="post">
    @csrf

    <label for="name">Customer Name</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="contact_number">Contact Number</label>
    <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number') }}">
    @error('contact_number')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="address">Address</label>
    <input type="text" id="address" name="address" value="{{ old('address') }}">
    @error('address')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="doctor_name">Doctor Name</label>
    <input type="text" id="doctor_name" name="doctor_name" value="{{ old('doctor_name') }}">
    @error('doctor_name')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="doctor_address">Doctor Address</label>
    <input type="text" id="doctor_address" name="doctor_address" value="{{ old('doctor_address') }}">
    @error('doctor_address')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">Submit</button>
</form>

@endsection
