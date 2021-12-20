@extends('layouts.auth.seller_auth')
@section('page-title','Seller Register')
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
                <img style="height:50px;" src="{{ asset('admin/app-assets/images/ico/sources1.png') }}"/>
            </a>
        </div>
        <br>
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title font-weight-bold mb-1 login-title"
                style="text-align: center; text-decoration: underline;" alt="Source Page Registration"><b>Source Page Registration</b></h2>
            <p class="card-text mb-2">Please Register your account and start the Adventure.</p>
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
                    <label class="form-label" for="company_name">Company Name<span style="color: red;">*</span></label>
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                       title="" data-original-title="Only accept letters, Write unique company name, Maximum letter: 255"></i>
                    <div class="input-group input-group-merge">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Company Name"
                               value="{{ old('name') }}" autocomplete="off" required>
                        <div class="invalid-feedback" id="companyNameError"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="sector">Select Sector<span style="color: red;">*</span></label>
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                       title="" data-original-title="Must be select one (product or service)"></i>
                    <div class="input-group input-group-merge">
                        <select class="form-control select2" id="sector" aria-invalid="false" name="sector">
                            <option selected disabled>Choose Sector</option>
                            <option value="product">Product</option>
                            <option value="service">Service</option>

                        </select>
                        <div class="invalid-feedback" id="sectorError"></div>
                    </div>
                </div>
                <div class="form-group type">
                    <label for="district">Type</label>
                    <select class="form-control select2" id="type" aria-invalid="false"
                            name="type">
                        <option value=""></option>
                    </select>
                    <div class="invalid-feedback" id="typeError"></div>
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
                    <label class="form-label" for="division">Division<span style="color: red;">*</span></label>
                    <div class="input-group input-group-merge">
                        <select class="form-control select2" id="select_division" aria-invalid="false" name="division">
                            <option selected disabled>Choose Division</option>
                            @foreach($divisions as $division)
                                <option value="{{$division->id}}">{{$division->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="divisionError"></div>
                    </div>
                </div>
                <div class="form-group district">
                    <label class="form-label" for="district">District<span style="color: red;">*</span></label>
                    <div class="input-group input-group-merge">
                        <select class="form-control select2" id="select_district" aria-invalid="false"
                                name="district">
                            <option value=""></option>
                        </select>
                        <div class="invalid-feedback" id="districtError"></div>
                    </div>
                </div>
                <div class="form-group upazila">
                    <label class="form-label" for="upazila">Upazila<span style="color: red;">*</span></label>
                    <div class="input-group input-group-merge">
                        <select class="form-control select2" id="select_upazila" aria-invalid="false"
                                name="upazila">
                            <option value=""></option>
                        </select>
                        <div class="invalid-feedback" id="upazilaError"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="address">Address<span style="color: red;">*</span></label>
                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                       title="" data-original-title="Address required"></i>
                    <div class="input-group input-group-merge">
                        <input type="text" id="address" name="address" class="form-control"
                               placeholder="Company Address" value="{{ old('address') }}" autocomplete="off">
                        <div class="invalid-feedback" id="addressError"></div>
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
                        <input class="custom-control-input" name="seller_terms_condition" id="remember-me"
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
            <p class="card-text text-center mt-2"><span>Have an Account? </span><a href="{{ route('partner.login') }}"
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
            $('.district').hide();
            $('.upazila').hide();
            $('.type').hide();
            $('#name').focusout(() => {
                $('#companyNameError').hide()
            })
            $('#phone_number').focusout(() => {
                $('#phoneError').hide()
            })
            $('#sector').focusout(() => {
                $('#sectorError').hide()
            })
            $('#type').focusout(() => {
                $('#typeError').hide()
            })
            $('#email-icon').focusout(() => {
                $('#emailError').hide()
            })
            $('#select_division').focusout(() => {
                $('#divisionError').hide()
            })
            $('#select_district').focusout(() => {
                $('#districtError').hide()
            })
            $('#select_upazila').focusout(() => {
                $('#upazilaError').hide()
            })
            $('#address').focusout(() => {
                $('#addressError').hide()
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
                url: '{{ route('partner.register') }}',
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
                        $('#companyNameError').text(error.responseJSON.errors.name).show();
                    }
                    if (error.responseJSON.errors.sector) {
                        $('#sectorError').text(error.responseJSON.errors.sector).show();
                    }
                    if (error.responseJSON.errors.type) {
                        $('#typeError').text(error.responseJSON.errors.type).show();
                    }
                    if (error.responseJSON.errors.email) {
                        $('#emailError').text(error.responseJSON.errors.email).show();
                    }
                    if (error.responseJSON.errors.phone_number) {
                        $('#phoneError').text(error.responseJSON.errors.phone_number).show();
                    }
                    if (error.responseJSON.errors.division) {
                        $('#divisionError').text(error.responseJSON.errors.division).show();
                    }
                    if (error.responseJSON.errors.district) {
                        $('#districtError').text(error.responseJSON.errors.district).show();
                    }
                    if (error.responseJSON.errors.upazila) {
                        $('#upazilaError').text(error.responseJSON.errors.upazila).show();
                    }
                    if (error.responseJSON.errors.address) {
                        $('#addressError').text(error.responseJSON.errors.address).show();
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
