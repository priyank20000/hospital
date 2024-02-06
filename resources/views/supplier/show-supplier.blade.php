@extends('sidebar')

@section('work')
    <h1>Customer Data</h1>
    <form action="{{ route('search-supplier') }}" method="GET" class="mb-3">
        <label for="search">Search:</label>
        <input type="text" class="form-control" id="search" name="search" placeholder="Enter customer name">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Doctor Name</th>
                <th>Doctor's Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($sourceData as $customer)
            
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->supplier_name }}</td>
                    <td>{{ $customer->supplier_address }}</td>
                    <td>{{ $customer->supplier_number }}</td>
                    <td>{{ $customer->supplier_email }}</td>
                    
                    <td>
                       
                        <button type="button" data-toggle="modal" data-target="#ex" value="{{$customer->id}}" class="btn btn-primary editbtn btn-sm">edit</button>
                        <form action="{{ route('delete-supplier', ['id' => $customer->id]) }}" method="post" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
      <!-- Modal -->
<div class="modal fade" id="ex" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing customer data -->
                <form id="editForm" action="{{url('/update-supplier')}}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden"name="stud_id" id="stud_id">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="supplier_name" name="supplier_name">
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number:</label>
                        <input type="text" class="form-control" id="supplier_address" name="supplier_address">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="supplier_number" name="supplier_number">
                    </div>
                    <div class="form-group">
                        <label for="address">doctor name:</label>
                        <input type="text" class="form-control" id="supplier_email" name="supplier_email">
                    </div>


                    <!-- Hidden input field to store customer ID -->
                    <input type="hidden" id="customerId" name="customerId">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </form>
    </div>

</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script>
    $(document).ready(function () {
        $(document).on('click', '.editbtn', function () {
            var stud_id = $(this).val();
            $('#ex').modal('show');

            $.ajax({
                type: "GET",
                url: "/edit-supplier/" + stud_id,
                success: function (response) {
                    // console.log("AJAX Success:", response);
                    $("#stud_id").val(response.student.id); // Updated to use the correct ID
                    $("#customerId").val(response.student.id);
                    $("#supplier_name").val(response.student.supplier_name);
                    $("#supplier_address").val(response.student.supplier_address);
                    $("#supplier_number").val(response.student.supplier_number);
                    $("#supplier_email").val(response.student.supplier_email);
                  
                }
            });
        });
    });
</script> 