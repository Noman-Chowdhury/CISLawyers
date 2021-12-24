<header id="header">
  <div class="topbar">
    <div class="container-fluid">
      <div class="row">
        <div class="col col-md-5 col-sm-12 col-12">
          <div class="contact-info">
            <ul>
              @auth
                <li><a href="#">Profile</a></li>
                <li><a href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
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
          <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
            <div class="mobail-menu">
              <button type="button" class="navbar-toggler open-btn">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar first-angle"></span>
                <span class="icon-bar middle-angle"></span>
                <span class="icon-bar last-angle"></span>
              </button>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-6">
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('home') }}"><img
                  src="{{ asset('admin/app-assets/images/ico/cislawyers_logo.png') }}"
                  alt="LOGO"></a>
            </div>
          </div>
          <div class="col-lg-8 col-md-1 col-1">
            <div id="navbar" class="collapse navbar-collapse navigation-holder">
              <button class="menu-close"><i class="ti-close"></i></button>
              <ul class="mb-2 nav navbar-nav mb-lg-0">
                <li><a class="@if (Route::currentRouteName() == 'home') active @endif" href="{{ route('home') }}">About Us</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="{{ route('partner.home') }}">Partner</a></li>

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
          <div class="col-lg-2 col-md-2 col-2">
{{--            <div class="header-right">--}}
{{--              <div class="close-form">--}}
{{--                <a class="theme-btn" class=" " href="#">Free--}}
{{--                  Consulting</a>--}}
{{--              </div>--}}
{{--            </div>--}}
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
