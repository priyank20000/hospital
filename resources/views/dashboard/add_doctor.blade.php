@extends('layout.admin_base')
@section('base')


<head>
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

</head>
						<div class="col-md-7 col-lg-8 col-xl-9 container">
                            <form action="{{ route('drprofilee.user') }}" method="POST" enctype="multipart/form-data">
                                @csrf
							<!-- Basic Information -->

							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
                                                        <img id="preview-profile-image" >
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" name="image" class="upload" id="input-profile-image" onchange="previewProfileImage()">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF, or PNG. Max size of 2MB</small>
                                                    </div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>username <span class="text-danger">*</span></label>
												<input name="username" type="text" class="form-control" >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input name="email" type="email" class="form-control" >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>First Name <span class="text-danger">*</span></label>
												<input name="firstname" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Last Name <span class="text-danger">*</span></label>
												<input name="lastname" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input name="phonenumber" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gender</label>
												<select name="gender" class="form-control select">
													<option>Select</option>
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Date of Birth</label>
												<input name="dob" type="date" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Basic Information -->

							<!-- About Me -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">About Me</h4>
									<div class="form-group mb-0">
										<label>Biography</label>
										<textarea name="about_me" class="form-control" rows="5"></textarea>
									</div>
								</div>
							</div>
							<!-- /About Me -->

							<!-- Clinic Info -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Clinic Info</h4>
									<div class="row form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Name</label>
												<input name="clinic_name" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Address</label>
												<input name="clinic_address" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Clinic Images</label>
                                                <div class="upload-wrap">
                                                    <div class="upload-images">
                                                        <img src="{{asset('assets/img/features/feature-01.jpg')}}" alt="Upload Image">
                                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                    <div class="upload-images">
                                                        <img src="{{asset('assets/img/features/feature-02.jpg')}}" alt="Upload Image">
                                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" name="clinic_images[]" class="upload" id="clinicImagesInput" multiple accept="image/*" onchange="handleClinicImages(event)">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF, or PNG. Max size of 2MB</small>
                                                </div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Clinic Info -->

							<!-- Contact Details -->
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Contact Details</h4>
									<div class="row form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Address Line 1</label>
												<input name="address_line_1" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Address Line 2</label>
												<input name="address_line_2" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">City</label>
												<input name="city" type="text" class="form-control">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">State / Province</label>
												<input name="state_province" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input name="country" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Postal Code</label>
												<input name="postal_code" type="text" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Contact Details -->


							<!-- Services and Specialization -->
							<div class="card services-card">
								<div class="card-body">
									<h4 class="card-title">Services and Specialization</h4>
									<div class="form-group">
										<label>Services</label>
										<input name="services" type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Tooth cleaning " name="services"  >
										<small class="form-text text-muted">Note : Type & Press enter to add new services</small>
									</div>
									<div class="form-group mb-0">
										<label>Doctour Salary </label>
										<input name="salary" class="input-tags form-control" type="text" data-role="tagsinput"  id="specialist">

									</div>
								</div>
							</div>
							<!-- /Services and Specialization -->






							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
                            </form>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->
            <script>
                // JavaScript code for image preview
                function previewProfileImage() {
                    var input = document.getElementById('input-profile-image');
                    var preview = document.getElementById('preview-profile-image');

                    var reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);
                }

                // JavaScript code to handle clinic images
                function handleClinicImages(event) {
                    const container = document.getElementById('clinicImagesContainer');
                    container.innerHTML = ''; // Clear the container before adding new images

                    const files = event.target.files;

                    for (let i = 0; i < files.length; i++) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
                            const imageContainer = document.createElement('div');
                            imageContainer.className = 'upload-images';
                            imageContainer.innerHTML = `
                                <img src="${e.target.result}" alt="Upload Image">
                                <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm" onclick="removeClinicImage(this)">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            `;

                            container.appendChild(imageContainer);
                        };

                        reader.readAsDataURL(files[i]);
                    }
                }

                function removeClinicImage(element) {
                    // Function to remove clinic image
                    const imageContainer = element.parentNode;
                    imageContainer.parentNode.removeChild(imageContainer);
                }
            </script>
            @endsection
