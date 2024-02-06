<!DOCTYPE html>
<html lang="en">

<!-- doccure/search.html  30 Nov 2019 04:12:16 GMT -->
<head>
    @include('layout.links')
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

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

      <style>

.seat {
    background-color: #444451;
    color: #fff;
    height: 44px;
    text-align: center;
    padding: 11px;
    width: 160px;
    margin: 3px;
}

.seat.selected {
  background-color: #6feaf6;
}

.seat.occupied {
  background-color: #fff;
}

.seat:nth-of-type(2) {
  margin-right: 18px;
}

.seat:nth-last-of-type(2) {
  margin-left: 18px;
}

.seat:not(.occupied):hover {
  cursor: pointer;
  transform: scale(1.2);
}

.showcase .seat:not(.occupied):hover {
  cursor: default;
  transform: scale(1);
}

.row {
  display: flex;
}

      </style>
	</head>

	<body>



        @include('layout.navbar')

			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">

									<!-- Checkout Form -->
									<form action="{{ route('checkout.store') }}" method="POST">
                                        @csrf
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>First Name</label>
														<input  name="name" class="form-control" type="text">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Last Name</label>
														<input class="form-control" type="text" required>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Email</label>
														<input name="email" class="form-control" type="email" required>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Phone</label>
														<input name="phone" class="form-control" type="text" required>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>doctor name</label>
														<input type="hidden" name="firstname" value="{{$sourceData->firstname}}" />
                                                        <input type="hidden" name="lastname" value="{{$sourceData->lastname}}" />
														<input type="hidden" name="services" value="{{$sourceData->services}}">
													</div>
												</div>

                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group card-label">
                                                        <label>Time</label>

                                                        @if(count($schedules) > 0)
                                                            <div class="container" id="movie">


                                                                    <div class="d-flex flex-column justify-content-center col-md-12" >
                                                                        <select name="time" id="selectedTime" class="form-group card-label" style="text-align: center;border: 0.1px rgb(217, 214, 214) solid; padding: 5px;">
                                                                            <option style="text-align: center;">
                                                                                ---------------- S e l e c t T i m e ---------------
                                                                            </option>
                                                                            @foreach ($schedules as $item)
                                                                                <option value="{{ $item->start_time }} - {{ $item->end_time }}" style="text-align: center;">
                                                                                    {{ $item->start_time }} - {{ $item->end_time }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>


                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>



                                                <br><div class="col-md-12 col-sm-12">
													<div class="form-group card-label">
														<label>Reasons for Appointment</label>
														<textarea  id="reasons" name="reason" rows="4" placeholder="Enter your reasons..." required style="width: 100%; padding: 10px; margin-top: 8px; border-radius: 8px; border: 1px solid #eee; outline: none;"></textarea>
													</div>
												</div>


											</div>

										</div>
										<!-- /Personal Information -->

										<div class="payment-widget">
											<h4 class="card-title">Payment Method</h4>

											<!-- Credit Card Payment -->
											<div class="payment-list">
												<label class="payment-radio credit-card-option">
													<input type="radio" name="radio" checked>
													<span class="checkmark"></span>
													Credit card
												</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_number">Card Number</label>
															<input class="form-control" id="card_number" placeholder="1234  5678  9876  5432" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control" id="expiry_month" placeholder="MM" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control" id="expiry_year" placeholder="YY" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="cvv">CVV</label>
															<input class="form-control" id="cvv" type="text">
														</div>
													</div>
												</div>
											</div>
											<!-- /Credit Card Payment -->



											<!-- Terms Accept -->
											<div class="terms-accept">
												<div class="custom-checkbox">
												   <input type="checkbox" id="terms_accept">
												   <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
												</div>
											</div>
											<!-- /Terms Accept -->

											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
											</div>
											<!-- /Submit Section -->

										</div>
									</form>
									<!-- /Checkout Form -->

								</div>
							</div>

						</div>

						<div class="col-md-5 col-lg-4 theiaStickySidebar">

							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">

									<!-- Booking Doctor Info -->
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="{{('../storage/'.$sourceData->image)}}" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.html">Dr.{{$sourceData->firstname}} {{$sourceData->lastname}}</a></h4>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">35</span>
											</div>
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
											</div>
										</div>
									</div>
									<!-- Booking Doctor Info -->

									<div class="booking-summary">
										<div class="booking-item-wrap">
                                            <div id="selectedTimeDisplay">
                                                <ul class="booking-date">
                                                    <li>Date <span id="selectedDate">Today</span></li>
                                                    <li>Time <span id="displayedTime"></span></li>
                                                </ul>
                                            </div>
											<ul class="booking-fee">
												<li>Consulting Fee <span>$100</span></li>
												<li>Booking Fee <span>$10</span></li>

											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">$160</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->

						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->


		</div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="/assets/js/jquery.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="/assets/js/popper.min.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>

		<!-- Sticky Sidebar JS -->
        <script src="/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

		<!-- Custom JS -->
		<script src="/assets/js/script.js"></script>

	</body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectedTimeDropdown = document.getElementById('selectedTime');
            const selectedDateSpan = document.getElementById('selectedDate');
            const displayedTimeSpan = document.getElementById('displayedTime');

            selectedTimeDropdown.addEventListener('change', function () {
                const selectedTime = selectedTimeDropdown.value;
                displayedTimeSpan.textContent = selectedTime;
            });
        });
    </script>

<!-- doccure/checkout.html  30 Nov 2019 04:12:16 GMT -->

</html>
