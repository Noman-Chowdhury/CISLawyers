@extends('layouts.frontend')

@section('content')

    <section class="wpo-contact-section section-padding">
        <div class="container">
            <div class="wpo-contact-section-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="wpo-contact-form-area">
                            <h2>Login Form</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div>
                                    <input id="email" type="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <div class="col-md-6">
                                        <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="submit-area">
                                    <button type="submit" class="theme-btn">Login</button>
                                </div>
                                <div class="submit-area">
                                    <a type="button" href="{{ route('social-login','GOOGLE') }}" class="theme-btn">Login with Gmail</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
