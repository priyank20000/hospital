
@extends('layout.dr_base')
@section('base')
<!-- Include jQuery (you can place this in your HTML head) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="col-md-7 col-lg-8 col-xl-9">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="profile-box">
                        <div class="row">



                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card schedule-widget mb-0">

                                    <!-- Schedule Header -->
                                    <div class="schedule-header">

                                        <h3>Appointments Time </h3>


                                    </div>
                                    <!-- /Schedule Header -->

                                    <!-- Schedule Content -->
                                    <div class="tab-content schedule-cont">

                                        <!-- Sunday Slot -->
                                        <div id="slot_sunday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                <a class="edit-link" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            <p class="text-muted mb-0">Not Available</p>
                                        </div>
                                        <!-- /Sunday Slot -->

                                        <!-- Monday Slot -->
                                        <div id="slot_monday" class="tab-pane fade show active">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                <a class="edit-link"  href="{{ url('dr_panal/'.$doctorData->id.'/edit_time')}}"><i class="fa fa-edit mr-1"></i>Edit</a>
                                            </h4>

                                            <!-- Slot List -->
                                            @if(count($schedules) > 0)
                                            <div class="row">
                                                @foreach ($schedules as $index => $item)
                                                    <div class="col-md-4">
                                                        <div class="doc-times">
                                                            <div class="doc-slot-list">
                                                                {{$item->start_time}} - {{$item->end_time}}
                                                                <a href="{{ url('dr_panal/'.$item->id.'/delete-schedule')}}" class="text-secondary font-weight-bold text-xs text-danger" data-toggle="tooltip" data-original-title="Edit user">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if (($index + 1) % 3 == 0)
                                                        </div><div class="row">
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                            <!-- /Slot List -->

                                        </div>
                                        <!-- /Monday Slot -->


                                    </div>
                                    <!-- /Schedule Content -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

</div>

</div>
<!-- /Page Content -->
<!-- Your existing HTML code -->

<!-- Add this JavaScript code at the end of your file or in a separate script file -->
<script>
    $(document).ready(function () {
        // Function to handle slot deletion
        function deleteSlot() {
            $(this).closest('.doc-slot-list').remove();
        }

        // Attach click event to delete_schedule links
        $('.delete_schedule').on('click', deleteSlot);

        // Function to handle adding a new slot

    });
</script>






@endsection

