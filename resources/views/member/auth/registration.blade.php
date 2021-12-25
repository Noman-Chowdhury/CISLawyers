@extends('layouts.auth.member_auth')
@section('page-title','Member Register')
@push('styles')
    <style type="text/css">
        #pageloader {
            background: rgba(255, 255, 255, 0.8);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        #pageloader img {
            left: 50%;
            margin-left: -32px;
            margin-top: -32px;
            position: absolute;
            top: 50%;
        }

        .input-group-append:not(:last-child) .input-group-text {
            border-right: 1px solid #D8D6DE;
            border-top-right-radius: 0.357rem !important;
            border-bottom-right-radius: 0.357rem !important;
        }

        .input-group-merge .form-control:not(:last-child) {
            border-right: 1px solid #D8D6DE;
            border-top-right-radius: 0.357rem !important;
            border-bottom-right-radius: 0.357rem !important;
        }

        @media only screen and (max-width: 851px) {
            .login-title {
                font-size: 1.2rem !important;
            }
        }
    </style>
@endpush
@section('content')
    <!-- Login-->
    <div id="pageloader">
        <img src="{{asset('images/pre-loader.gif')}}" alt="processing..."/>
    </div>
    <div class="col-lg-4 auth-bg px-2 p-lg-2">
        <div class="d-flex justify-content-center pl-2">
            <a class="" href="{{url('/')}}">
	            <img style="height:50px;" src="{{ asset('admin/app-assets/images/ico/cislawyers_logo.png') }}"/>
            </a>
        </div>
        <br>
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h3 class="card-title font-weight-bold mb-1 login-title"
                style="text-align: center; text-decoration: underline;" alt="Member Registration"><b>Member Registration</b></h3>
{{--            <p class="card-text mb-2">Please Register your account and start the Adventure.</p>--}}
            @if ($errors->any())
                <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-primary">
                    <div class="alert-body font-small-2">
                        @foreach ($errors->all() as $error)
                            <p><small class="mr-50">{{ $error }}</small></p>
                        @endforeach
                    </div>
                </div>
            @endif
            <form class="auth-login-form mt-2" action="" method="POST" id="registerSubmit">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="user-role" id="member">Member type</label>
                    <select id="user-role" class="form-control" name="type">
                        <option value="lawyer">Lawyer</option>
                        <option value="consultant">Consultant</option>
                    </select>
                    <div class="invalid-feedback" id="memberError"></div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-fullname" id="name">Full Name</label>
                    <input type="text" class="form-control dt-full-name"
                           id="name" placeholder="Type valid name"
                           name="name"
                    >
                    <div class="invalid-feedback" id="nameError"></div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">Email<span style="color: red;">*</span></label>
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                       title="" data-original-title="Write valid email address"></i>
                    <div class="input-group input-group-merge">
                        <input type="text" name="email" id="email-icon" class="form-control" placeholder="Email"
                               value="{{ old('email') }}" autocomplete="off">
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="phone_number">Phone Number<span style="color: red;">*</span></label>
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                       title="" data-original-title="Must be write 11 digits,Only accept numeric value"></i>
                    <div class="input-group input-group-merge">
                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                               placeholder="Phone Number" value="{{ old('phone_number') }}" autocomplete="off">
                        <div class="invalid-feedback" id="phoneError"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="login-password">Password<span style="color: red;">*</span>
                            <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                               title="" data-original-title="Minimum 8 characters, Maximum 20 characters"></i>
                        </label>

                    </div>

                    <div class="input-group input-group-merge form-password-toggle">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="lock"></i></span>
                        </div>
                        <input type="password" id="login-password" class="form-control" name="password"
                               placeholder="Password" autocomplete="off"/>
                        <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                                    data-feather="eye"></i></span></div>
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="login-password">Retype Password<span style="color: red;">*</span>
                            <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                               title="" data-original-title="Minimum 8 characters, Maximum 20 characters"></i>
                        </label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="lock"></i></span>
                        </div>
                        <input type="password" id="password_confirmation" class="form-control"
                               name="password_confirmation" placeholder="Confirm Password" autocomplete="off"/>
                        <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                                    data-feather="eye"></i></span></div>
                        <div class="invalid-feedback" id="passwordConfirmationError"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="member_terms_condition" id="remember-me"
                               type="checkbox" tabindex="3" autocomplete="off" required/>
                        <label class="custom-control-label" for="remember-me"> Accept All <a href="">Terms and
                                Condition</a>
                            <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                               title="" data-original-title="Must be check in or visit"></i>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit" tabindex="4">Register</button>
            </form>
            <p class="card-text text-center mt-2"><span>Have an Account? </span><a href="{{ route('member.login') }}"
                                                                                   class="router-link-active"
                                                                                   target="_self"><span> Sign In</span></a>
            </p>

        </div>
    </div>
    <!-- /Login-->

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#name').focusout(() => {
                $('#nameError').hide()
            })
            $('#phone_number').focusout(() => {
                $('#phoneError').hide()
            })
            $('#member').focusout(() => {
                $('#memberError').hide()
            })
            $('#email-icon').focusout(() => {
                $('#emailError').hide()
            })
            $('#login-password').focusout(() => {
                $('#passwordError').hide()
            })
            $('#password_confirmation').focusout(() => {
                $('#passwordConfirmationError').hide()
            })

        });
        {{--$('#select_division').change(function () {--}}
        {{--    $.ajax({--}}
        {{--        url: "{{route('districts.get_by_division')}}?division_id=" + $(this).val(),--}}
        {{--        method: 'GET',--}}
        {{--        success: function (data) {--}}
        {{--            $('.district').show();--}}
        {{--            $('#select_district').html(data.html);--}}
        {{--        }--}}
        {{--    });--}}
        {{--    $('#select_district').on('change', function () {--}}

        {{--        //console.log($('#select_district').val());--}}
        {{--        $.ajax({--}}
        {{--            url: "{{route('upazila.get_by_district')}}?district_id=" + $(this).val(),--}}
        {{--            method: 'GET',--}}
        {{--            success: function (data) {--}}
        {{--                $('.upazila').show();--}}
        {{--                $('#select_upazila').html(data.html);--}}
        {{--            }--}}
        {{--        })--}}
        {{--    });--}}
        {{--});--}}
        $('#registerSubmit').submit(function (e) {
            $("#pageloader").fadeIn();
            e.preventDefault()
            {{--            {{ route('seller.register') }}--}}

            // console.log($("#registerSubmit").serialize(),);
            $.ajax({
                url: '{{ route('member.register') }}',
                data: $("#registerSubmit").serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                success: function (response) {
                    console.log(response)
                    if (response.success) {
                        window.location.replace(response.route);
                        toastr.success('Registered successfully')
                    }
                    $("#pageloader").fadeOut();

                },
                error: function (error) {
                    $("#pageloader").fadeOut();
                    const obj = error.responseJSON.errors;
                    for (key in obj) {
                        // console.log(obj[key])
                        toastr.error(obj[key])
                    }
                    if (error.responseJSON.errors.name) {
                        $('#nameError').text(error.responseJSON.errors.name).show();
                    }
                    if (error.responseJSON.errors.member) {
                        $('#memberError').text(error.responseJSON.errors.sector).show();
                    }
                    if (error.responseJSON.errors.email) {
                        $('#emailError').text(error.responseJSON.errors.email).show();
                    }
                    if (error.responseJSON.errors.phone_number) {
                        $('#phoneError').text(error.responseJSON.errors.phone_number).show();
                    }
                    if (error.responseJSON.errors.password[0]) {
                        $('#passwordError').text(error.responseJSON.errors.password[0]).show();
                    }
                    if (error.responseJSON.errors.password[1]) {
                        $('#passwordConfirmationError').text(error.responseJSON.errors.password[1]).show();
                    }

                }
            });
        })
    </script>
@endpush
