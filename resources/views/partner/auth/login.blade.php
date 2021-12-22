@extends('layouts.auth.partner_auth')
@section('page-title','Partner Login')
@push('styles')
<style type="text/css">
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
        .login-title{
            font-size: 1.4rem !important;
        }
    }
    #hide{

     }

</style>
@endpush
@section('content')
    <!-- Login-->
    <div class="d-flex align-items-center auth-bg px-2 p-lg-5 col-lg-4">
    <div class="px-xl-2 mx-auto col-sm-8 col-md-10 col-lg-12">
        <div class="d-flex justify-content-center">
            <a class="" href="{{url('/')}}">
{{--                <img style="height:50px;" src="{{ asset('admin/app-assets/images/ico/sources1.png') }}"/>--}}
                <h1 style="margin-bottom: 20px; font-weight:bold">CIS-LAWYERS</h1>
            </a>
        </div>

        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title font-weight-bold mb-1 underline text-center login-title" style="text-decoration: underline"><b>Partner Login</b></h2>
            <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>

            <div role="alert" aria-live="polite" aria-atomic="true" id="hide" class="alert alert-primary" style="display:none !important;">
                <div class="alert-body font-small-2">
                      <p> <small class="mr-50">Too many login attempts. Please try again in <span id="countdowntimer">120</span> Seconds</small> </p>
                </div>
            </div>

            @if ($errors->any())
                <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-primary">
                    <div class="alert-body font-small-2">
                        @foreach ($errors->all() as $error)
                            <p><small class="mr-50">{{ $error }}</small></p>
                        @endforeach
                    </div>
                </div>
            @endif
            <form class="auth-login-form mt-2" action="{{ route('partner.login') }}" method="POST">
                @csrf
                 <div class="form-group">
                    <label class="form-label" for="login-email">Email<span style="color: red;">*</span></label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="mail"></i></span>
                        </div>
                          <input type="text" name="email" id="email-icon" class="form-control"  placeholder="Email" value="{{ old('email') }}" autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="login-password">Password<span style="color: red;">*</span></label><a href="{{route('partner.password.request')}}"><small>Forgot Password?</small></a>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="lock"></i></span>
                        </div>
                        <input type="password" id="login-password" class="form-control" name="password" placeholder="Password" />

                        <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                        <label class="custom-control-label" for="remember-me"> Remember Me</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
            </form>
{{--            <p class="card-text text-center mt-2"><span>New on our platform? </span><a href="{{ route('partner.register') }}" class="router-link-active" target="_self"><span> Create an account</span></a></p>--}}
        </div>
    </div>
    </div>
    <!-- /Login-->
@endsection

@push('scripts')
        <script type="text/javascript">
            $(document).ready(function (){
            var timeleft = '{{session('second')}}';
            console.log(timeleft)
            var downloadTimer = setInterval(function(){
                timeleft--;
                document.getElementById("countdowntimer").textContent = timeleft;
                if(timeleft <= 0){
                        $('#hide').hide();
                }else {
                       $('#hide').show();
                }
            },1000);
            })
    </script>
@endpush
