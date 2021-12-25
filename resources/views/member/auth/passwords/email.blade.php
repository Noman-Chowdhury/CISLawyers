@extends('layouts.auth.partner_auth')
@section('page-title','Partner Forgot Password')
@section('content')

    <div class="d-flex align-items-center col-lg-4  auth-bg px-2 p-lg-5">
        <div>
            <div class="d-flex justify-content-center" style="margin-bottom: 5rem">
                <a class="" href="{{url('/')}}">
	                <img style="height:50px;" src="{{ asset('admin/app-assets/images/ico/cislawyers_logo.png') }}"/>
                </a>
            </div>
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title font-weight-bold mb-1">Forgot Password? 🔒</h2>
                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>
                @if ($errors->any())
                    <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-primary">
                        <div class="alert-body font-small-2">
                            @foreach ($errors->all() as $error)
                                <p><small class="mr-50">{{ $error }}</small></p>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (session('status'))
                    <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-primary">
                        <div class="alert-body font-small-2">
                            <p><small class="mr-50">{{ session('status') }}</small></p>
                        </div>
                    </div>
                @endif
                <form class="auth-forgot-password-form mt-2" action="{{route('partner.password.email')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="forgot-password-email">Email</label>
                        <input class="form-control" id="forgot-password-email" type="email" name="email" placeholder="example@example.com" aria-describedby="forgot-password-email" autofocus="" tabindex="1"/>
                    </div>
                    <button class="btn btn-primary btn-block" tabindex="2">Send reset link</button>
                </form>
                <p class="text-center mt-2">
                    <a href="{{route('partner.login')}}"><i data-feather="chevron-left"></i> Back to login</a></p>
            </div>
        </div>
    </div>
@endsection