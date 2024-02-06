@extends('sidebar')

@section('work')
<style>
    h1 {
        color: #3498db; /* Blue color for headings */
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #3498db; /* Blue color for labels */
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ced4da;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    button {
        background-color: #3498db; /* Blue color for buttons */
        color: #ffffff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #2980b9; /* Slightly darker blue on hover */
    }

    .alert {
        background-color: #e74c3c; /* Red color for error messages */
        color: #ffffff;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
</style>

<h1>Add Supplier</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('supplier.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="supplier_name">Supplier Name:</label>
        <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="{{ old('supplier_name') }}" required>
    </div>
    <div class="form-group">
        <label for="supplier_email">Supplier Email:</label>
        <input type="email" class="form-control" id="supplier_email" name="supplier_email" value="{{ old('supplier_email') }}" required>
    </div>
    <div class="form-group">
        <label for="supplier_number">Supplier Number:</label>
        <input type="text" class="form-control" id="supplier_number" name="supplier_number" value="{{ old('supplier_number') }}" required>
    </div>
    <div class="form-group">
        <label for="supplier_address">Supplier Address:</label>
        <input type="text" class="form-control" id="supplier_address" name="supplier_address" value="{{ old('supplier_address') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Supplier</button>
</form>
@endsection
