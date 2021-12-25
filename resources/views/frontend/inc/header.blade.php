@push('styles')
<style>
    /* ============ desktop view ============ */
    @media all and (min-width: 992px) {
        .navbar .nav-item .dropdown-menu {
            display: none;
        }

        .navbar .nav-item:hover .nav-link {
        }

        .navbar .nav-item:hover .dropdown-menu {
            display: block;
        }

        .navbar .nav-item .dropdown-menu {
            margin-top: 0;
        }
    }

    /* ============ desktop view .end// ============ */
</style>
@endpush

<header id="header">
    <div class="topbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-5 col-sm-12 col-12">
                    <div class="contact-info">
                        <ul>
                            @auth
                                <li><a href="#">Profile</a></li>
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="#" method="POST" style="display: none;">@csrf</form>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                            <li><a href="#" target="_blank"><i
                                        class="ti-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i
                                        class="ti-twitter-alt"></i></a></li>
                            <li><a href="#" target="_blank"><i
                                        class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-md-7 col-sm-12 col-12">
                    <div class="contact-intro">
                        <ul>
                            {{--              <li><i class="fi ti-mobile"></i> {{ Cache::get('settings')->phone }}</li>--}}
                            {{--              <li><i class="fi ti-email"></i> {{ Cache::get('settings')->email }}</li>--}}
                            {{--              <li><i class="fi ti-location-pin"></i> {{ Cache::get('settings')->address }}</li>--}}
                            <li><i class="fi ti-mobile"></i> +880161059182</li>
                            <li><i class="fi ti-email"></i> cis@gmail.com</li>
                            <li><i class="fi ti-location-pin"></i> Dhaka, Bangladesh</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wpo-site-header">
        <nav class="navigation navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="row align-items-center">
{{--                    <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">--}}
{{--                        <div class="mobail-menu">--}}
{{--                            <button type="button" class="navbar-toggler open-btn">--}}
{{--                                <span class="sr-only">Toggle navigation</span>--}}
{{--                                <span class="icon-bar first-angle"></span>--}}
{{--                                <span class="icon-bar middle-angle"></span>--}}
{{--                                <span class="icon-bar last-angle"></span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-lg-2 col-md-2 col-2">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ route('home') }}"><img
                                    src="{{ asset('admin/app-assets/images/ico/cislawyers_logo.png') }}"
                                    alt="LOGO"></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-1 col-1">
                        <div id="navbar" class="collapse navbar-collapse navigation-holder">
                            <button class="menu-close"><i class="ti-close"></i></button>
                            <ul class="mb-2 nav navbar-nav mb-lg-0">
                                <div class="collapse navbar-collapse" id="main_nav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item" style="padding:15px 0"><a class="nav-link"  href="{{url('/')}}">About Us</a></li>
                                        <li class="nav-item dropdown nav_padding" style="padding: 15px 0" >
                                            <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                                Services </a>
                                            <ul class="dropdown-menu">
                                                @php
                                                $services = \App\Models\Service::where('status','active')->get()
                                                @endphp

                                                @foreach($services as $service)
                                                    <li><a class="dropdown-item" href="{{ route('service-request',['selected'=>$service->slug]) }}">{{ $service->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="nav-item " style="padding: 15px 0"><a class="nav-link" href="#">Lawyers </a></li>
                                        <li class="nav-item " style="padding: 15px 0"><a class="nav-link" href="#">Consultants </a></li>
                                        <li class="nav-item " style="padding: 15px 0"><a class="nav-link" href="#">Financial Associates </a></li>
                                        <li class="nav-item " style="padding: 15px 0"><a class="nav-link" href="#">Success </a></li>
                                        <li class="nav-item " style="padding: 15px 0"><a class="nav-link" href="#">Contact Us </a></li>
                                        <li class="nav-item " style="padding: 15px 0"><a class="nav-link" href="#" style="background:#e3b576; padding: 10px 15px; color:#000;border-radius: 10px">Join us</a></li>
                                        <li class="nav-item  position-right" style="padding: 15px 0"><a class="nav-link" href="#"  style="margin-left: 10px; background:#e3b576; padding: 10px 15px; color:#000;border-radius: 10px">Get Appointment</a></li>
                                    </ul>
                                </div> <!-- navbar-collapse.// -->

                                {{--                @foreach (Cache::get('pages') as $page)--}}
                                {{--                  <li><a href="{{ url('/' . $page->slug) }}">{{ $page->title }}</a></li>--}}
                                {{--                @endforeach--}}
                                {{-- <li><a class="@if (Route::currentRouteName() == 'aboutus') active @endif" href="{{ route('aboutus') }}">About Us</a></li>
                                <li><a class="@if (Route::currentRouteName() == 'services') active @endif" href="{{ route('services') }}">Services</a></li>
                                <li><a class="@if (Route::currentRouteName() == 'attorneys') active @endif" href="{{ route('attorneys') }}">Attorneys</a></li>
                                <li><a class="@if (Route::currentRouteName() == 'practices') active @endif" href="{{ route('practices') }}">Practice Area</a></li>
                                <li><a class="@if (Route::currentRouteName() == 'cases') active @endif" href="{{ route('cases') }}">Our Cases</a></li>
                                <li><a class="@if (Route::currentRouteName() == 'faq') active @endif" href="{{ route('faq') }}">FAQ</a></li> --}}
                                {{--                <li><a class="@if (Route::currentRouteName() == 'contact') active @endif" href="{{ route('contact') }}">Contact Us</a></li>--}}
                            </ul>
                        </div>
                    </div>
{{--                    <div class="col-lg-3 col-md-3 col-3">--}}
{{--                                    <div class="header-right">--}}
{{--                                      <div class="close-form">--}}
{{--                                        <a class="" href="#">Join Us</a>--}}
{{--                                      </div>--}}
{{--                                        <div class="close-form">--}}
{{--                                            <a class="" href="#">Get Appointment</a>--}}
{{--                                        </div>--}}
{{--                         </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </nav>
    </div>
</header>
<script>
    // $(document).ready(function() {
    //     var pathname = window.location.pathname;
    //     $('.nav > li > a[href="'+pathname+'"]').parent().addClass('active');
    // })
    document.addEventListener("DOMContentLoaded", function () {
// make it as accordion for smaller screens
        if (window.innerWidth > 992) {

            document.querySelectorAll('.navbar .nav-item').forEach(function (everyitem) {

                everyitem.addEventListener('mouseover', function (e) {

                    let el_link = this.querySelector('a[data-bs-toggle]');

                    if (el_link != null) {
                        let nextEl = el_link.nextElementSibling;
                        el_link.classList.add('show');
                        nextEl.classList.add('show');
                    }

                });
                everyitem.addEventListener('mouseleave', function (e) {
                    let el_link = this.querySelector('a[data-bs-toggle]');

                    if (el_link != null) {
                        let nextEl = el_link.nextElementSibling;
                        el_link.classList.remove('show');
                        nextEl.classList.remove('show');
                    }


                })
            });

        }
// end if innerWidth
    });
</script>
