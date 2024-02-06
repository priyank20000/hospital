<!-- resources/views/medicines/create.blade.php -->

@extends('sidebar')

@section('work')

<h1>ADD</h1>

<form action="{{ url('/medicines') }}" method="post">
    @csrf

    <label for="supplier_id">Supplier:</label>
    <select name="supplier_id" required>
        @foreach($sourceData as $supplier)
            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
        @endforeach
    </select>

    <label for="name">Medicine Name:</label>
    <input type="text" name="medicine_name" required>

    <label for="packing">Packing:</label>
    <input type="text" name="packing" required>

    <label for="generic_name">Generic Name:</label>
    <input type="text" name="generic_name" required>

    <button type="submit">Submit</button>
</form>

@endsection
