<!-- resources/views/report/purchase_report.blade.php -->

@extends('sidebar')

@section('work')

    <h1>Purchase Report</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Supplier Name</th>
                <th>Invoice Number</th>
                <th>Purchase Date</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAmount = 0;
            @endphp

            @foreach($purchaseData as $purchase)
                <tr>
                    <td>{{ $purchase->supplier->supplier_name }}</td>
                    <td>{{ $purchase->invoice_number }}</td>
                    <td>{{ $purchase->invoice_date }}</td>
                    <td>{{ $purchase->amount }}</td>
                </tr>
                @php
                    $totalAmount += $purchase->amount;
                @endphp
            @endforeach

           
            <tr>
                <td colspan="3" class="text-right"><strong>Total Amount:</strong></td>
                <td>{{ $totalAmount }}</td>
            </tr>
        </tbody>
    </table>

@endsection
