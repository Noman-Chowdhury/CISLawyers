<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="A platform that will impact and ease your life.">
	<meta name="keywords" content="Source your business in sources.com.bd">
	<meta name="author" content="Sources">
	<title>Sources | Best B2B Wholesale Market in Bangladesh</title>
	<link rel="apple-touch-icon" href="{{ asset('admin/app-assets/images/ico/webtech.png') }}">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/app-assets/images/ico/webtech.png') }}">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
	{{--    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/toastr.m Vin.css') }}">--}}
	{{--    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">--}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
	{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">--}}
	<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/app-email.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/flag-icon-css/css/flag-icon.css')}}">

{{--	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>--}}

	@stack('styles')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

@include('agent.inc.header')
@include('agent.inc.sidebar')

<!-- BEGIN: Content-->
<div class="app-content content ">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						@yield('breadcrumb')
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			@yield('content')
		</div>
	</div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('agent.inc.footer')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
{{--    <script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>--}}
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

{!! Toastr::message() !!}


@stack('scripts')
<script>
    //type and search by select2 plugin
    $('.select2').select2();
    $(window).on('load',  function(){
        if (feather) {
            feather.replace({ width: 14, height: 14 });
        }
    })
    //dataTable initialize
    $(document).ready( function (){
        $('#dataTable').DataTable();
    })
    //all error message show in tostr
	@if ($errors->any())
	@foreach ($errors->all() as $error)
    toastr.error('{{$error}}', 'Error', {
        closeButton: true,
        progressBar: true,
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut',
        timeOut: 5000,
    });
	@endforeach
	@endif

    //sweetalert 2
    let confirmText = $('.confirm-text');
    if (confirmText.length) {
        confirmText.on('click', function (event) {
            var form =  $(this).closest("form");
            // var name = $(this).data("name");
            event.preventDefault();
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
                if (result.value) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                }
            });
        });
    }
    //custom id to restore data
    var confirmRestore = $('.confirm-restore');
    if (confirmRestore.length) {
        confirmRestore.on('click', function (event) {
            var form =  $(this).closest("form");
            // var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This will Restore into Database Again!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Restore it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                }
            });
        });
    }
    //custom id to delete data forever
    let confirmDeleteForever = $('.confirm-deleteForever');
    if (confirmDeleteForever.length) {
        confirmDeleteForever.on('click', function (event) {
            var form =  $(this).closest("form");
            // var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This Data will Permanently Deleted, and Can't Restore it Again!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete it Forever!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                }
            });
        });
    }
</script>
</body>
<!-- END: Body-->
</html>