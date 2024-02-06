<!-- resources/views/medicines/show_medicines.blade.php -->

@extends('sidebar')

@section('work')
        <h1>Medicine Data</h1>


    <!-- Medicine Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>medicine name</th>
                <th>packing</th>
                <th>batch id</th>
                <th>EX DATE </th>
                <th>quantity</th>
                <th>mrp</th>
                <th>rate</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchaseData as $medicine)
                <tr>
                    <td>{{ $medicine->id }}</td>
                    <td>{{ $medicine->medicine_name }}</td>
                    <td>{{ $medicine->packing }}</td>
                    <td>{{ $medicine->batch_id }}</td>
                    <td>{{ $medicine->expiry_date }}</td>
                    <td>{{ $medicine->quantity }}</td>
                    <td>{{ $medicine->mrp }}</td>
                    <td>{{ $medicine->rate }}</td>
                    <td>{{ $medicine->paytype }}</td>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#ex" value="{{ $medicine->id }}" class="btn btn-primary editbtn btn-sm">Edit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
