<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item mr-auto">
				<a class="" href="{{url('/')}}">
					<img style="height:40px; margin: 20px 20px;"
					     src="#"
					/>
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
					<a class="d-flex align-items-center" href="{{ route('admin.home') }}"><i class="fas fa-tachometer-alt"></i><span class="menu-title text-truncate" data-i18n="dashboard">{{__('Dashboard')}}</span></a>
				</li>
        </ul>
    </div>
</div><!-- END: Main Menu-->
