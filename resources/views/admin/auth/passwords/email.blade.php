@extends('layouts.auth.admin_auth')
@section('page-title','Admin Forgot Password')
@section('content')

    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <div class="d-flex justify-content-center">
                <a class="" href="{{url('/')}}">
                    <img style="height:40px; margin: 20px 20px;"  src="{{ asset('images/'.\App\Models\AdminSetting::first()->logo) }}">
                </a>
            </div>
            <h2 class="card-title font-weight-bold mb-1">Forgot Password? 🔒</h2>
            <br>
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
            <form class="auth-forgot-password-form mt-2" action="{{route('admin.password.email')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="forgot-password-email">Email</label>
                    <input class="form-control" id="forgot-password-email" type="email" name="email" placeholder="example@example.com" aria-describedby="forgot-password-email" autofocus="" tabindex="1" />
                </div>
                <button class="btn btn-primary btn-block" tabindex="2">Send reset link</button>
            </form>
            <p class="text-center mt-2"><a href="{{route('admin.login')}}"><i data-feather="chevron-left"></i> Back to login</a></p>
        </div>
    </div>
@endsection
