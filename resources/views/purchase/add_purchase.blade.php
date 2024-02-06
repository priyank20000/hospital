@extends('sidebar')

@section('work')

<style>
    .form-container {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .btn-container {
        margin-top: 20px;
    }
</style>

<div class="container-fluid">
    <div class="container">
      @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <!-- Display error message if available -->
  @if(session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
  @endif
        <div class="form-container">
            <form action="{{ url('/purchase/store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="supplier_id">Supplier:</label>
                    <select name="supplier_id" required>
                        @foreach($supplierData as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="invoice_number">Invoice Number :</label>
                    <input type="number" class="form-control" placeholder="Invoice Number" id="invoice_number" name="invoice_number" required>
                    <code class="text-danger small font-weight-bold float-right" id="invoice_number_error" style="display: none;"></code>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="paytype">Payment Type :</label>
                    <select id="payment_type" name="paytype" class="form-control">
                        <option value="Cash Payment">Cash Payment</option>
                        <option value="Net Banking">Net Banking</option>
                        <option value="Payment Due">Payment Due</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="invoice_date">Date :</label>
                    <input type="date" class="datepicker form-control hasDatepicker" id="invoice_date" name="invoice_date">
                    <code class="text-danger small font-weight-bold float-right" id="date_error" style="display: none;"></code>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="medicine_name">Medicine:</label>
                            <select name="medicine_name" required>
                                @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->medicine_name }}">{{ $medicine->medicine_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="mrp">MRP:</label>
                        <input type="text" class="form-control" name="mrp" required>
                      </div>
                  </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="packing">Packing:</label>
                            <input type="text" class="form-control" name="packing" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="batch_id">Batch ID:</label>
                            <input type="text" class="form-control" name="batch_id" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date (MM YY):</label>
                            <input type="text" class="form-control" name="expiry_date" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="text" class="form-control" name="quantity" id="quantity" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="rate">Rate:</label>
                            <input type="text" class="form-control" name="rate" id="rate" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="text" class="form-control" name="amount" id="amount" readonly>
                        </div>
                    </div>
                </div>

                <div class="btn-container">
                    <button type="button" class="btn btn-success" id="addRow" >Add</button>
                    <button type="button" class="btn btn-danger" id="deleteRow">Delete</button>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('quantity').addEventListener('input', calculateAmount);
    document.getElementById('rate').addEventListener('input', calculateAmount);

    function calculateAmount() {
        const quantity = parseFloat(document.getElementById('quantity').value) || 0;
        const rate = parseFloat(document.getElementById('rate').value) || 0;
        const amount = quantity * rate;
        document.getElementById('amount').value = amount.toFixed(2);
    }




    </script>

@endsection
