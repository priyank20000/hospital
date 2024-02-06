<!-- resources/views/medicines/show_medicines.blade.php -->

@extends('sidebar')

@section('work')
        <h1>Medicine Data</h1>

    <!-- Search Form -->
    <form action="{{ url('/search/medicines') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="supplier_name">Supplier Name:</label>
                    <input type="text" class="form-control" name="supplier_name">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="invoice_number">Invoice Number:</label>
                    <input type="text" class="form-control" name="invoice_number">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="invoice_date">Purchase Date:</label>
                    <input type="date" class="form-control" name="invoice_date">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="paytype">Payment Status:</label>
                    <select class="form-control" name="paytype">
                        <option value="">All</option>
                        <option value="Net Banking">Net Banking</option>
                        <option value="Cash Payment">Cash Payment</option>
                        <option value="Payment Due">Payment Due</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Medicine Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Supplier Name</th>
                <th>Invoice Number</th>
                <th>Purchase Date</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sourceData as $medicine)
                <tr>
                    <td>{{ $medicine->id }}</td>
                    <td>{{ $medicine->supplier->supplier_name }}</td>
                    <td>{{ $medicine->invoice_number }}</td>
                    <td>{{ $medicine->invoice_date }}</td>
                    <td>{{ $medicine->paytype }}</td>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#ex" value="{{ $medicine->id }}" class="btn btn-primary editbtn btn-sm">Edit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
