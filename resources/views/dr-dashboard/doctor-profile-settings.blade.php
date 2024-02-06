@extends('layout.dr_base')
@section('base')


						<div class="col-md-7 col-lg-8 col-xl-9">
                            <form action="{{ route('drprofile.user') }}" method="POST" enctype="multipart/form-data">
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
												<label>Username <span class="text-danger">*</span></label>
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
												<input name="dob" type="text" class="form-control">
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
										<input name="services" type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" value="Tooth cleaning " id="services">
										<small class="form-text text-muted">Note : Type & Press enter to add new services</small>
									</div>
									<div class="form-group mb-0">
										<label>Specialization </label>
										<input name="specialization" class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="specialist" value="Children Care,Dental Care" id="specialist">
										<small class="form-text text-muted">Note : Type & Press  enter to add new specialization</small>
									</div>
								</div>
							</div>
							<!-- /Services and Specialization -->

							<!-- Education -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Education</h4>
									<div class="education-info">
										<div class="row form-row education-cont">
											<div class="col-12 col-md-10 col-lg-11">
												<div class="row form-row">
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>Degree</label>
															<input name="degree" type="text" class="form-control">
														</div>
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>College/Institute</label>
															<input name="college_institute" type="text" class="form-control">
														</div>
													</div>
													<div class="col-12 col-md-6 col-lg-4">
														<div class="form-group">
															<label>Year of Completion</label>
															<input name="year_of_completion" type="text" class="form-control">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
							<!-- /Education -->



							<!-- Awards -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Awards</h4>
									<div class="awards-info">
										<div class="row form-row awards-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Awards</label>
													<input name="awards" type="text" class="form-control">
												</div>
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input name="year_of_awards" type="text" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
							<!-- /Awards -->



							<!-- Registrations -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Registrations</h4>
									<div class="registrations-info">
										<div class="row form-row reg-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Registrations</label>
													<input name="registrations" type="text" class="form-control">
												</div>
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input name="registration_year" type="text" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
							<!-- /Registrations -->

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
