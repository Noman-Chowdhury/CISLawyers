<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            </ul>
        </div>


        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon flag-icon-{{ app()->getLocale() == 'en' ?'us':'bd' }}"></i>
                    <span class="selected-language">{{ app()->getLocale() == 'en' ?'English':'বাংলা' }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="{{ route('set-locale','en') }}" data-language="en">
                        <i class="flag-icon flag-icon-us"></i> English
                    </a>
                    <a class="dropdown-item" href="{{ route('set-locale','bn') }}" data-language="fr">
                        <i class="flag-icon flag-icon-bd"></i> বাংলা
                    </a>
                </div>
            </li>
            {{--            <li class="nav-item nav-search">--}}
            {{--                <a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>--}}
            {{--                <div class="search-input">--}}
            {{--                    <div class="search-input-icon"><i data-feather="search"></i></div>--}}
            {{--                    <input class="form-control input" type="text" placeholder="Search everywhere..." tabindex="-1">--}}
            {{--                    <div class="search-input-close"><i data-feather="x"></i></div>--}}
            {{--                    <ul class="search-list search-list-main"></ul>--}}
            {{--                </div>--}}
            {{--            </li>--}}
                <li class="nav-item dropdown dropdown-notification mr-25">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon"
                                                                                             data-feather="bell"></i><span
                            class="badge badge-pill badge-danger badge-up">7</span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 mr-auto"> {{__('Notifications')}}</h4>
                                <div
                                    class="badge badge-pill badge-light-primary">7
                                    New
                                </div>
                            </div>
                        </li>
                            <li class="scrollable-container media-list"><a class="d-flex" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left">
                                            {{--  avatar goes here--}}
                                            {{-- <div class="avatar"><img src="#" alt="avatar" width="32" height="32"></div>--}}
                                        </div>
{{--                                        <div class="media-body">--}}
{{--                                            <a href="{{ route('seller.mark-as-read',[($notification->id), $notification->data['route_name'], encrypt($notification->data['item_id'])??"null"]) }}">--}}
{{--                                                <p class="media-heading">{!! $notification->data['data'] !!}--}}

{{--                                                </p><small--}}
{{--                                                    class="notification-text"> {{$notification->created_at->diffForHumans()}}</small></a>--}}
{{--                                        </div>--}}
                                    </div>
                                </a>
                            </li>
                        <li class="dropdown-menu-footer">
                            <a class="btn btn-primary btn-block"
                               href="#">{{__('Read all Notifications')}}</a>
                        </li>
                    </ul>
                </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name font-weight-bolder">{{auth('member')->user()->name}}</span>
                        <span class="user-status">{{ auth('member')->user()->partner_type }}</span>
{{--                        @foreach(auth('member')->user()->getRoleNames() as $name)--}}
{{--                            <span class="user-status">Consultant or Lawyers</span>--}}
{{--                        @endforeach--}}
                    </div>
                    <span class="avatar">

                            <img class="round" src="{{asset(config('imagepath.member-profile').auth('member')->user()->profile_image ?? '')}}"
                                 alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{route('member.show.profile')}}"><i class="mr-50"
                                                                                        data-feather="user"></i>
                        {{__('Profile')}}</a>
                    {{--					<a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="mail"></i> Inbox</a>--}}
                    {{--					<div class="dropdown-divider"></div>--}}
                    {{--					<a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="settings"></i>--}}
                    {{--						Settings</a>--}}
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                            class="mr-50" data-feather="power"></i> {{__('Logout')}}</a>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav><!-- END: Header-->

