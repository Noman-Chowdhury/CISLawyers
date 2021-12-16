@extends('layouts.auth.seller_auth')
@section('page-title','Seller Verify')
@section('content')

    <!-- Login-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div>
            <div class="d-flex justify-content-center" style="margin-bottom: 5rem">
                <a class="" href="{{url('/')}}">
                    <img style="height:50px;" src="{{ asset('admin/app-assets/images/ico/sources1.png') }}"/>
                </a>
            </div>
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h1 class="card-title font-weight-bold mb-1" style="text-align: center; text-decoration: underline"><b>Seller Verify</b></h1>
{{--            <h2 class="card-title font-weight-bold mb-1" style="text-align: center">Welcome to Sources BD!</h2>--}}
{{--            <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>--}}
            @if ($errors->any())
                <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-primary">
                    <div class="alert-body font-small-2">
                        @foreach ($errors->all() as $error)
                            <p><small class="mr-50">{{ $error }}</small></p>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
{{--                    <div class="card-header text-success font-medium-2">{{ __('Verify Your Email Address') }}</div>--}}
                    <div class="card-header text-success font-medium-2">{{ __('Verification Link Sent to your email, Please verify it soon!') }}</div>
                </div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                    {{ __('If you did not receive the email') }} --}}
                     {{ __('আপনার ইমেইলে একটি ভেরিফিকেশন লিংক পাঠানো হয়েছে। ভেরিফাই লিংকে ক্লিক করুন।') }}
                    {{ __('আপনি যদি লিঙ্কটি না পেয়ে থাকেন -') }} <br>
{{--                    <form class="d-inline" method="POST" action="{{ route('seller.verification.resend') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                    </form>--}}
{{--                        <form id="logout-form" action="{{ route('seller.logout') }}" method="POST" class="d-inline">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here for new account') }}</button>--}}
{{--                        </form>--}}
                        <form class="d-inline" method="POST" action="{{ route('seller.verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('আরেকটি অনুরোধ করুন') }}</button> ||
                        </form>
                        <form id="logout-form" action="{{ route('seller.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __(' নতুন অ্যাকাউন্ট তৈরি করুন') }}</button>
                        </form>
                </div>

            </div>

        </div>
    </div>
   <div>
    <!-- /Login-->

@endsection
