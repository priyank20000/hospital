@extends('layout.admin_base')
@section('base')

		<!-- Favicons -->
		<link href="/assets/img/favicon.png" rel="icon">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">

		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="/assets/plugins/fancybox/jquery.fancybox.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="/assets/css/appointment.css">


	</head>
    <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-4" style="margin-left: 2rem;">LOGING ACTIVE TABLE</h6>
        <div class="col-11 text-end">
            <a href="{{route('add_doctor')}}"><button class="btn btn-outline-primary btn-sm mb-0" style="color: #cb0c9f; border-color: #cb0c9f;background: none;">Add Docter</button></a><br><br>
        </div>
    </nav>

    @if(count($user) > 0)
    <div class="container">
        @php $count = 0 @endphp
        @foreach ($user as $doctor)
            @if($count % 3 == 0)
                <div class="row">
            @endif
            <div class="col-md-4">
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="patient-profile.html" class="booking-doc-img">
                                    <img src="{{('../storage/'.$doctor->image)}}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="patient-profile.html">{{$doctor->username}}{{$doctor->lastname}}</a></h3>
                                    <div class="patient-details">
                                        <h5><b>Doctor ID :</b> {{$doctor->id}}</h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Alabama, USA</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li>Phone <span class="badge badge-sm bg-gradient-success" style="color: #fff; font-size: 0.8rem">{{$doctor->phonenumber}}</span></li>
                                <li>Services <span>{{$doctor->services}}</span></li>
                                <li>Salary <span>{{$doctor->salary}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @php $count++ @endphp
            @if($count % 3 == 0 || $loop->last)
                </div>
            @endif
        @endforeach
    </div>
@endif

			<!-- /Page Content -->
            <script>
                // Add this if you want to handle toggle events
                document.getElementById("toggleSwitch").addEventListener("change", function() {
                    var status = this.checked ? "on" : "off";
                    console.log("Switch is " + status);
                });

            </script>

            @endsection

