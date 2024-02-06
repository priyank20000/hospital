<!-- resources/views/medicines/show_medicines.blade.php -->

@extends('sidebar')

@section('work')
    <h1>Medicine Data</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Packing</th>
                <th>Generic Name</th>
                <th>Supplier ID</th>
                <th>Supplier Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sourceData as $medicine)
                <tr>
                    <td>{{ $medicine->id }}</td>
                    <td>{{ $medicine->medicine_name }}</td>
                    <td>{{ $medicine->packing }}</td>
                    <td>{{ $medicine->generic_name }}</td>
                    <td>{{ $medicine->supplier_id }}</td>
                    <td>{{ $medicine->supplier->supplier_name }}</td>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#ex" value="{{ $medicine->id }}" class="btn btn-primary editbtn btn-sm">Edit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
