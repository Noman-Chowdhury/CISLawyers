<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto" style="width: 80%">
                <a class="" href="{{url('/')}}">
                 <img style="height:40px; margin: 20px 20px;"  src="{{ asset('images/'.\App\Models\AdminSetting::first()->logo) }}">
{{--                    <h3 style="height:40px; margin: 20px 20px;">CIS-LAWYERS</h3>--}}
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"
                    ></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"
                    ></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->segment(2)=='home' ? 'active' :'' }} nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.home') }}"><i
                        class="fas fa-tachometer-alt"></i><span class="menu-title text-truncate"
                                                                data-i18n="dashboard">{{__('Dashboard')}}</span></a>
            </li>
            <li class="{{ Route::CurrentRouteName()=='service.index' ? 'active' :'' }} nav-item">
                <a class="d-flex align-items-center" href="{{ route('service.index') }}"><i
                        class="fas fa-list"></i><span class="menu-title text-truncate"
                                                                data-i18n="dashboard">{{__('Services')}}</span></a>
            </li>
            <li class="{{ Route::CurrentRouteName()=='client.index' ? 'active' :'' }} nav-item">
                <a class="d-flex align-items-center" href="{{ route('client.index') }}"><i
                        class="fas fa-user"></i><span class="menu-title text-truncate"
                                                                data-i18n="dashboard">{{__('Clients')}}</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"> <i class="fas fa-users"></i>
                    <span class="menu-title text-truncate" data-i18n="User">{{__('Members')}}</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::CurrentRouteName()=='admin.member.list' ? 'active' :'' }} nav-item"><a
                            class="d-flex align-items-center" href="{{ route('admin.member.list') }}"><i
                                class="fas fa-list"></i><span class="menu-title text-truncate"
                                                              data-i18n="Home">{{__('Member list')}}</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                        class="fas fa-pager"
                    ></i><span class="menu-title text-truncate" data-i18n="User"
                    >{{__('Page Management')}}</span></a>
                <ul class="menu-content">
                    <li class="{{  Route::CurrentRouteName()=='basic' ? 'active' :'' }} nav-item"><a
                            class="d-flex align-items-center" href="{{ route('basic') }}"
                        ><i class="fab fa-product-hunt"></i><span class="menu-title text-truncate"
                                                                  data-i18n="Home"
                            >{{__('Basic')}}</span></a></li>
                    <li class="{{  Route::CurrentRouteName()=='home.setting' ? 'active' :'' }} nav-item"><a
                            class="d-flex align-items-center" href="{{ route('home.setting') }}"
                        ><i class="fab fa-product-hunt"></i><span class="menu-title text-truncate"
                                                                  data-i18n="Home"
                            >{{__('Home')}}</span></a></li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                        class="fas fa-file-archive"
                    ></i><span class="menu-title text-truncate" data-i18n="User"
                    >{{__('Case Management')}}</span></a>
                <ul class="menu-content">
                    <li class="{{  Route::currentRouteName()=='case.index' && !request()->service ?'active':'' }} nav-item"><a
                            class="d-flex align-items-center" href="{{ route('case.index') }}"
                        ><i class="fab fa-product-hunt"></i><span class="menu-title text-truncate"
                                                                  data-i18n="Home"
                            >{{__('All Cases')}}</span></a></li>
                    @php
                        $casses=\App\Models\ServiceRequest::all()->groupBy('service_id');
                        $services = \App\Models\Service::select('name','slug','id')->get();
                    @endphp
                        @foreach($casses as $key=>$case)
                            <li class="{{  Route::currentRouteName()=='case.index' && request()->service==$key ?'active':'' }} nav-item"><a
                                    class="d-flex align-items-center" href="{{ route('case.index', ['service'=>$key]) }}"
                                ><i class="fab fa-product-hunt"></i><span class="menu-title text-truncate"
                                                                          data-i18n="Home"
                                    >{{ \App\Models\Service::findOrFail($key)->name }}</span> &nbsp;<span class="badge badge-danger">{{ \App\Models\ServiceRequest::where('service_id', $key)->get()->count() }}</span></a></li>
                        @endforeach
                </ul>
            </li>
        </ul>
    </div>

</div><!-- END: Main Menu-->
