@extends('layout.dr_base')
@section('base')

<div class="col-md-7 col-lg-8 col-xl-9">
    <form action="{{ route('schedule.store', ['id' => $doctorData->id]) }}" method="POST">
        @csrf
        <!-- Basic Information -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Time</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Starting Time  <span class="text-danger">*</span></label>
                            <input name="start_time" type="time" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ending Time  <span class="text-danger">*</span></label>
                            <input name="end_time" type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-row" id="additionalTimes">
                    <!-- Additional time fields will be added here dynamically -->
                </div>

            </div>
        </div>
        <!-- /Education -->

        <div class="submit-section submit-btn-bottom">
            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
        </div>
    </form>
</div>
</div>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


@endsection
