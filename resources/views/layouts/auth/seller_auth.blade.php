<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="A platform that will impact and ease your life">
    <meta name="keywords" content="Source your business in sources.com.bd">
    <meta name="author" content="SOURCES">
    <title>@yield('page-title','CIS Lawyers')| {{config('app.name')}}</title>
{{--    <title>Login | Sources | Best Communication Platforms For business.</title>--}}
{{--    <link rel="apple-touch-icon" href="{{ asset('admin/app-assets/images/ico/webtech.png') }}'">--}}
{{--    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/app-assets/images/ico/sources.png') }}">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">--}}

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/bordered-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/page-auth.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
    <!-- END: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/fontawesome-free-5.15.1-web/css/all.css') }}">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    @stack('styles')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-v2">
                <div class="auth-inner row m-0">
                    <!-- Brand logo-->
{{--                    <a class="brand-logo" href="javascript:void(0);">--}}
{{--                        <img style="margin: 20px 20px; height:50px;" src="{{ asset('admin/app-assets/images/ico/sources2.png') }}"/>--}}
{{--                    </a>--}}
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex align-items-center p-5 col-lg-8">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('admin/app-assets/images/pages/Sign-up-banner2.png') }}" alt="sources.com.bd" /></div>
                    </div>
                    <!-- /Left Text-->
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('admin/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('admin/app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->
<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
{{--<script src="{{ asset("admin/plugins/fontawesome-free-5.15.1-web/js/all.js") }}"></script>--}}
<!-- BEGIN: Page JS-->
<script src="{{ asset('admin/app-assets/js/scripts/pages/page-auth-login.js') }}"></script>
<!-- END: Page JS-->
{!! Toastr::message() !!}
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
@stack('scripts')
<script>
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
</script>
</body>
<!-- END: Body-->

</html>
