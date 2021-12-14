@extends('layouts.agent')
@section('breadcrumb')
	<h2 class="content-header-title float-left mb-0">Profile</h2>
	<div class="breadcrumb-wrapper">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('agent.home') }}">Home</a></li>
			<li class="breadcrumb-item active">Profile</li>

		</ol>
	</div>
@endsection
@section('content')

	<div class="content-wrapper">
		<div class="content-body">
			<!-- account setting page -->
			<section id="page-account-settings">
				<div class="row">
					<!-- left menu section -->
					<div class="col-md-3 mb-2 mb-md-0">
						<ul class="nav nav-pills flex-column nav-left" id="myTab">
							<!-- general -->
							<li class="nav-item">
								<a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
									<i class="fas fa-user"></i><span class="font-weight-bold">{{__('General')}}</span>
								</a>
							</li>
							<!-- change password -->
							<li class="nav-item">
								<a class="nav-link" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
									<i class="fas fa-key"></i>
									<span class="font-weight-bold">{{__('Change Password')}}</span>
								</a>
							</li>
						</ul>
					</div>
					<!--/ left menu section -->

					<!-- right content section -->
					<div class="col-md-9">
						<div class="card">
							<div class="card-body">
								<div class="tab-content">
									<!-- general tab -->
									<div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
										<!-- form -->
										<form class="validate-form mt-2" novalidate="novalidate" method="post" action="{{route('agent.update_general',$data->id)}}" enctype="multipart/form-data">
											@csrf
											<div class="media">
												<a href="javascript:void(0);" class="mr-25">
													<img  id="account-upload-img" src="{{asset('images/profile/').$data->image}}" class="rounded mr-50"  height="80" width="80"><br><br>
													<p>Profile Image</p>
												</a>
												<!-- upload and reset button -->
												<div class="media-body mt-75 ml-1">
													<label for="account-upload"
													       class="btn btn-sm btn-primary mb-75 mr-75 waves-effect waves-float waves-light">Upload</label>
													<input type="file" id="account-upload" hidden="" name="image"  accept="image/*">
												</div>
											</div>
											<div class="row">
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="account-name">Name</label>
														<input type="text" class="form-control" id="account-name" name="name" placeholder="Name" value="{{$data->name}}">
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="account-e-mail">E-mail</label>
														<input type="email" class="form-control" id="account-e-mail" name="email" placeholder="Email" value="{{$data->email}}">
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="account-phone">Phone</label>
														<input type="text" class="form-control" placeholder="Phone number"  name="phone" autocomplete="off" value="{{$data->phone_number}}">
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="account-birth-date">Birth date</label>
														<input type="date" class="form-control flatpickr flatpickr-input" placeholder="Birth date" id="account-birth-date" name="dob" value="{{$data->dob }}">
													</div>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-primary mt-2 mr-1 waves-effect waves-float waves-light">
														Save changes
													</button>
													<button type="reset" class="btn btn-outline-secondary mt-2 waves-effect">Cancel
													</button>
												</div>
											</div>
										</form>
										<!--/ form -->
									</div>
									<!--/ general tab -->

									<!-- change password -->
									<div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
										<!-- form -->
										<form class="validate-form" novalidate="novalidate" id="change_password" method="post" action="{{route('agent.update.password',$data->id)}}">
											@csrf

											<div class="form-group col-sm-6">
												<label for="account-old-password">Old Password</label>
												<div class="input-group form-password-toggle input-group-merge">
													<input type="password" class="form-control @error('password') is-invalid @enderror" id="account-old-password" name="password" placeholder="Old Password">
													<div class="input-group-append">
														<div class="input-group-text cursor-pointer">
															<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
																<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
																<circle cx="12" cy="12" r="3"></circle>
															</svg>
														</div>
													</div>
												</div>
											</div>

											@error('password')
											<div class="invalid-feedback">{{ $message }}</div>
											@enderror
											<div class="form-group col-sm-6">
												<label for="account-new-password">New Password</label>
												<div class="input-group form-password-toggle input-group-merge">
													<input type="password" id="account-new-password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password">
													<div class="input-group-append">
														<div class="input-group-text cursor-pointer">
															<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
																<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
																<circle cx="12" cy="12" r="3"></circle>
															</svg>
														</div>
													</div>
												</div>
											</div>
											@error('new_password')
											<div class="invalid-feedback">{{ $message }}</div>
											@enderror


											<div class="form-group col-sm-6">
												<label for="account-retype-new-password">Retype New Password</label>
												<div class="input-group form-password-toggle input-group-merge">
													<input type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" id="account-retype-new-password" name="confirm_new_password" placeholder="New Password">

													<div class="input-group-append">
														<div class="input-group-text cursor-pointer">
															<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
																<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
																<circle cx="12" cy="12" r="3"></circle>
															</svg>
														</div>
													</div>
												</div>
												<span style="color:#FF0052;" id="password_confirm_error"></span>
											</div>
											@error('confirm_new_password')
											<div class="invalid-feedback">{{ $message }}</div>
											@enderror

											<div class="col-12">
												<button type="submit" class="btn btn-primary mr-1 mt-1 waves-effect waves-float waves-light change_password">
													Save changes
												</button>
												<button type="reset" class="btn btn-outline-secondary mt-1 waves-effect">Cancel
												</button>
											</div>

										</form>
										<!--/ form -->
									</div>
									<!--/ change password -->
								</div>
							</div>
						</div>
					</div>
					<!--/ right content section -->
				</div>
			</section>
			<!-- / account setting page -->

		</div>
	</div>



@endsection
@push('scripts')

	<script>
        $(function () {
            $('a[data-toggle="pill"]').on('click', function (e) {
                window.localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            let activeTab = window.localStorage.getItem('activeTab');
            if (activeTab) {
                $('.nav-pills a[href="' + activeTab + '"]').tab('show');
                window.localStorage.removeItem("activeTab");
            }
        });
        $(document).ready(function () {
            $("#account-e-mail").prop("disabled", true);
            $("#account-username").prop("disabled", true);
            // $("#account-phone").prop("disabled", true);

            $("#password_confirm_error").hide();
            let error_password_confirm = false;

            $("#account-retype-new-password").focusout(function () {
                check_password_confirm();
            });

            function check_password_confirm() {
                let password = $("#account-new-password").val();
                let password_confirm = $("#account-retype-new-password").val();
                if (password_confirm !== password) {
                    $("#password_confirm_error").html("Password not matched");
                    $("#password_confirm_error").show();
                    $("#password_confirm").css("border-bottom", "2px solid #f90A0A");
                    error_password_confirm = true;
                } else {
                    $("#password_confirm_error").hide();
                    $("#password_confirm").css("border-bottom", "2px solid #34F458");
                }
            }

        })

	</script>
@endpush
