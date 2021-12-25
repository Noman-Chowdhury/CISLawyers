@extends('layouts.admin')

@section('breadcrumb')
    <div class="col-12">
        <h2 class="content-header-title float-left mb-0">{{__('Page Management')}}</h2>
    </div>
@endsection
@section('content')
    <section>
        <div class="row match-height">
            <!-- Tabs with Icon starts -->
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i data-feather='arrow-right'></i> Basic Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('basic.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-8 mb-2 mx-auto">
                                    <div class="border rounded p-2">
                                        <h4 class="mb-1">{{__('Header Logo')}}</h4>
                                        <div class="media flex-column flex-md-row">
                                            <img src="{{(asset('/images'.$data->logo))}}" id="header_logo_view" class="rounded mr-2 mb-1 mb-md-0"
                                                 width="170" height="110" alt="logo"/>
                                            <div class="media-body">
                                                <div class="d-inline-block">
                                                    <div class="form-group mb-0">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="logo"
                                                                   id="header_logo_input" accept="image/*"/>
                                                            <label class="custom-file-label" for="blogCustomFile">Choose
                                                                file</label>
                                                        </div>
                                                        <small class="text-muted">Required image resolution 312x64, image size
                                                            10KB.</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 mb-2">
                                    <div class="form-group">
                                        <label class="form-label" for="company_url">{{__('Email')}}</label>
                                        <input type="email" class="form-control" id="email"
                                               placeholder="Enter valid company email" name="email" value="{{ $data->email }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 mb-2">
                                    <div class="form-group">
                                        <label class="form-label" for="phone_number">{{__('Phone Number')}}</label>
                                        <input type="number" class="form-control" id="phone_number"
                                               placeholder="Enter valid phone number" name="phone_number" value="{{ $data->phone_number }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 mb-2">
                                    <div class="form-group">
                                        <label class="form-label" for="address">{{__('Address')}}</label>
                                        <input type="text" class="form-control" id="address"
                                               placeholder="Enter area address" name="address" value="{{ $data->address }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="account-twitter">{{__('Twitter')}}</label>
                                        <input type="text" id="account-twitter" name="twitter_url" class="form-control"
                                               placeholder="Add link" value="{{ $data->twitter_url }}">
                                    </div>
                                </div>
                                <!-- facebook link input -->
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="account-facebook">{{__('Facebook')}}</label>
                                        <input type="text" id="account-facebook" name="facebook_url"
                                               class="form-control" placeholder="Add link" value="{{ $data->facebook_url }}">
                                    </div>
                                </div>
                                <!-- google plus input -->
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="account-google">{{__('Google+')}}</label>
                                        <input type="text" id="account-google" name="google_plus_url"
                                               class="form-control" placeholder="Add link" value="{{ $data->google_plus_url }}">
                                    </div>
                                </div>
                                <!-- linkedin link input -->
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="account-linkedin">{{__('LinkedIn')}}</label>
                                        <input type="text" id="account-linkedin" name="linkedin_url"
                                               class="form-control" placeholder="Add link" value="{{ $data->linkedin_url }}">
                                    </div>
                                </div>
                                <!-- instagram link input -->
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="account-instagram">{{__('Instagram')}}</label>
                                        <input type="text" id="account-instagram" name="instagram_url"
                                               class="form-control" placeholder="Add link" value="{{ $data->instagram_url }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 mb-2">
                                    <div class="form-group">
                                        <label class="form-label" for="slogan">{{__('Slogan')}}</label>
                                        <input type="text" class="form-control" id="slogan"
                                               placeholder="Enter desired slogan" name="slogan" value="{{ $data->slogan }}">
                                    </div>
                                </div>

                            </div>
                            <button type="submit"
                                    class="btn btn-primary mr-1 mt-1 waves-effect waves-float waves-light">
                                {{__('Submit')}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Tabs with Icon ends -->
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('#header_logo_input').ready(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#header_logo_view').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#header_logo_input").change(function () {
                readURL(this);
            });
        })
    </script>
@endpush
