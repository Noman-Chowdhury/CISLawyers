@extends('layouts.admin')

@push('styles')
    <link href="{{ asset('admin/app-assets/css/fileinput.css') }}" rel="stylesheet">
    <style>
        .image-area {
            position: relative;
            width: 25%;
            background: #333;
        }

        .image-area img {
            max-width: 100%;
            height: auto;
        }

        .remove-image {
            display: none;
            position: absolute;
            top: -10px;
            right: -10px;
            border-radius: 10em;
            padding: 2px 6px 3px;
            text-decoration: none;
            font: 700 21px/20px sans-serif;
            background: #555;
            border: 3px solid #fff;
            color: #FFF;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            -webkit-transition: background 0.5s;
            transition: background 0.5s;
        }

        .remove-image:hover {
            background: #E54E4E;
            padding: 3px 7px 5px;
            top: -11px;
            right: -11px;
        }

        .remove-image:active {
            background: #E54E4E;
            top: -10px;
            right: -11px;
        }
    </style>
@endpush
@section('breadcrumb')
    <div class="col-12">
        <h2 class="content-header-title float-left mb-0">{{__('Page Management')}}</h2>
    </div>
@endsection
@section('content')
    <section id="basic-tabs-components">
        <div class="row match-height">
            <!-- Tabs with Icon starts -->
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i data-feather='arrow-right'></i> Home Page</h4>
                        {{--                            <div class="dt-action-buttons text-right">--}}
                        {{--                                <div class="dt-buttons d-inline-flex">--}}
                        {{--                                    <button class="dt-button create-new btn btn-primary" tabindex="0"--}}
                        {{--                                            aria-controls="DataTables_Table_0" id="submit_all" type="submit">--}}
                        {{--                                        <span>{{__('Save Changes')}}</span>--}}
                        {{--                                    </button>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="slider-tab" data-toggle="tab" href="#slider"
                                   aria-controls="slider" role="tab"
                                   aria-selected="true">{{__('Slider')}}</a>
                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="sliderText-tab" data-toggle="tab" href="#sliderText"
                                                                   aria-controls="sliderText" role="tab"
                                                                   aria-selected="true">{{__('Slider texts')}}</a>
                                                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="feature-tab" data-toggle="tab" href="#feature"--}}
{{--                                   aria-controls="feature" role="tab"--}}
{{--                                   aria-selected="false">{{__('Feature')}}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"--}}
{{--                                   aria-controls="contact" role="tab"--}}
{{--                                   aria-selected="false">{{__('Contact')}}</a>--}}
{{--                            </li>--}}
                        </ul>
                        {{--  //Details Information--}}
                        <div class="tab-content">
                            <div class="tab-pane active" id="slider" aria-labelledby="slider-tab"
                                 role="tabpanel">
                                <div class="card-body">
                                    <form method="post" id="formSubmit" action="{{ route('store.carousel') }}"
                                          role="form"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-12 md-2">
                                                @foreach($sliderImages as $image)
                                                    <div style=" float: left" class="m-md-1 image-area">
                                                        <img
                                                            src="{{(asset(config('imagepath.slider').$image->filename))}}">
                                                        <a class="remove-image confirm-image"
                                                           onclick="confirmation(event)"
                                                           href="{{route('slider.image.delete', $image->id)}}"
                                                           style="display: inline;">&#215;</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group col-12">
                                                <div class="file-loading" style="width: 10px;">
                                                    <input id="file-1" type="file" name="image[]" multiple class="file"
                                                           data-overwrite-initial="false" data-min-file-count="2"
                                                           value="{{ old('image[]') }}">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{--Images Title--}}
                            <div class="tab-pane" id="sliderText" aria-labelledby="sliderText-tab"
                                 role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
	                                        <form action="{{ route('store.slider.text') }}" method="POST">
		                                        @csrf
		                                        @method('PUT')
                                            <div class="card-body">
                                                <div class="row">
                                                        @foreach($sliderImages as $image)
                                                            <div class="col-sm-6 col-6 mb-2 col-lg-6">
                                                                <label for="image_text">Image {{$loop->iteration}}
                                                                    Title:</label>
                                                                <input type="text" name="image[{{$image->id}}][title]"
                                                                       class="form-control"
                                                                       placeholder="text"
                                                                       value="{{ old('image.title', $image->title) }}" required=""
                                                                       autocomplete="off">
                                                            </div>
		                                                    <div class="col-sm-6 col-6 mb-2 col-lg-6">
			                                                    <label for="image_text">Image {{$loop->iteration}}
				                                                    text:</label>
			                                                    <input type="text" name="image[{{$image->id}}][text]"
			                                                           class="form-control"
			                                                           placeholder="image text"
			                                                           value="{{ old('image.text', $image->text) }}" required=""
			                                                           autocomplete="off">
		                                                    </div>
                                                        @endforeach
                                                </div>
	                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
	                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tabs with Icon ends -->
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('admin/app-assets/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/app-assets/js/theme.js') }}" type="text/javascript"></script>
    <script>
        // Tab reload error
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            localStorage.setItem('lastTab1', $(this).attr('href'));
        });

        let lastTab = localStorage.getItem('lastTab1');
        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }

        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "/image-view",
            dropZoneTitle: 'Upload Images',
            // validateInitialCount: true,
            fileActionSettings: {
                showUpload: false,
                showZoom: false,
                showDrag: false,
                indicatorNew: ''
            },
            browseClass: "btn btn-outline-dark waves-effect",
            uploadExtraData: function () {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileTypes: ['image'],
            allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
            overwriteInitial: false,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });

        $('.confirm-image').on('click', function (event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                console.log(result);
                if (!result.dismiss) {
                    window.location.href = urlToRedirect;
                }
            });
        });
    </script>


@endpush