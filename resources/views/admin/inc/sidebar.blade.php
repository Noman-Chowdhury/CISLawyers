<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item mr-auto">
				<a class="" href="{{url('/')}}">
					<img style="height:40px; margin: 20px 20px;"
					     src="{{ asset('admin/app-assets/images/ico/sources1.png') }}"
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
			<li class="{{ request()->segment(1)==' ' ? 'active' :'' }} nav-item"><a class="d-flex align-items-center"
			                                                                        href="#"
			                                                                        style="place-content: center; font-weight: bold"
				><span class="menu-title text-truncate text-center">Total Wallet: <br>{{ number_format(array_sum(\App\Models\Wallet::all()->pluck('balance')->toArray()), 2, '.', ',') }} BDT</span></a></li>
			@can('dashboard.show')
				{{--                <li class="{{ request()->segment(2)=='home' ? 'active' :'' }} nav-item">--}}
				{{--                    <a class="d-flex align-items-center" href="{{ route('admin.home') }}"><i data-feather="home"--}}
				{{--                        ></i><span class="menu-title text-truncate" data-i18n="Home">{{__('Dashboard')}}</span></a>--}}
				{{--                </li>--}}
				<li class="{{ request()->segment(2)=='home' ? 'active' :'' }} nav-item">
					<a class="d-flex align-items-center" href="{{ route('admin.home') }}"><i class="fas fa-tachometer-alt"></i><span class="menu-title text-truncate" data-i18n="dashboard">{{__('Dashboard')}}</span></a>
				</li>
			@endcan
			@if(Gate::check('category.show') || Gate::check('sector.show'))
				<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-stream"></i> <span
								class="menu-title text-truncate" data-i18n="User"
						>{{__('Category Management')}}</span></a>
					<ul class="menu-content">
						{{--                        @can('attribute.show')--}}
						{{--                            <li class="{{ request()->segment(2)=='attribute'?'active':'' }} nav-item">--}}
						{{--                                <a class="d-flex align-items-center" href="{{route('attribute.index')}}"><i--}}
						{{--                                        class="fas fa-bezier-curve"></i><span class="menu-title text-truncate"--}}
						{{--                                                                              data-i18n="Home">{{__('Attribute')}}</span></a>--}}
						{{--                            </li>--}}
						{{--                        @endcan--}}

						{{--                        @can('attribute-value.show')--}}
						{{--                            <li class="{{ request()->segment(2)=='attributeValue'?'active':'' }} nav-item">--}}
						{{--                                <a class="d-flex align-items-center" href="{{route('attributeValue.index')}}"><i--}}
						{{--                                        class="fas fa-bezier-curve"></i><span class="menu-title text-truncate"--}}
						{{--                                                                              data-i18n="Home">{{__('Attribute Value')}}</span></a>--}}
						{{--                            </li>--}}
						{{--                        @endcan--}}

						@can('category.show')
							<li class="{{ request()->segment(2)=='category'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('category.index')}}"><i
											class="fas fa-stream"
									></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Category')}}</span></a>
							</li>
						@endcan

                        {{--                        @can('category-attribute.show')--}}
                        {{--                            <li class="{{ request()->segment(2)=='category-attribute'?'active':'' }} nav-item">--}}
                        {{--                                <a class="d-flex align-items-center" href="{{route('category-attribute.index')}}"><i--}}
                        {{--                                        class="fas fa-stream"></i><span class="menu-title text-truncate"--}}
                        {{--                                                                        data-i18n="Home">{{__('Category Attribute')}}</span></a>--}}
                        {{--                            </li>--}}
                        {{--                        @endcan--}}
                        @can('sector.show')
                            <li class="{{ request()->segment(2)=='sector'?'active':'' }} nav-item">
                                <a class="d-flex align-items-center" href="{{route('sector.index')}}">
                                    <i class="fab fa-sellsy"></i><span class="menu-title text-truncate"
                                                                       data-i18n="Home"
                                    >{{__('Sector')}}</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

			@if(auth('admin')->user()->can('product.show') or auth('admin')->user()->can('units.show') or auth('admin')->user()->can('product-comments.show') or auth('admin')->user()->can('product-inquiry.show') or auth('admin')->user()->can('review.show'))
				<li class=" nav-item"><a class="d-flex align-items-center" href="#"> <i class="fas fa-baby-carriage"
						></i>
						<span class="menu-title text-truncate" data-i18n="User">{{__('Product Management')}}</span></a>
					<ul class="menu-content">
						@can('product.show')
							<li class="{{ request()->segment(2)=='product'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('product.index')}}"
								><i class="fas fa-user-secret"></i><span class="menu-title text-truncate"
							                                             data-i18n="Home"
									>{{__('Product')}}</span></a>
							</li>
						@endcan
						@can('product-feature.show')
							<li class="{{ request()->segment(2)=='feature-product'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('product.feature.list')}}"
								><i class="fas fa-user-secret"></i><span class="menu-title text-truncate"
							                                             data-i18n="Home"
									>{{__('Feature product')}}</span></a>
							</li>
						@endcan
						@can('product-sponsor.show')
							<li class="{{ request()->segment(2)=='sponsor-product'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('product.sponsor.list')}}"
								><i class="fas fa-user-secret"></i><span class="menu-title text-truncate"
							                                             data-i18n="Home"
									>{{__('Sponsor Product')}}</span></a>
							</li>
						@endcan
						@can('units.show')
							<li class="{{ request()->segment(2)=='units'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('units.index')}}"><i
											class="fas fa-sort-amount-up"
									></i><span class="menu-title text-truncate" data-i18n="Home">{{__('Units')}}</span></a>
							</li>
						@endcan
						@can('product-inquiry.show')
							<li class="{{ request()->segment(2)=='product-inquiry'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('product-inquiry.index')}}"><i
											class="fas fa-search"
									></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Inquiries')}}</span></a>
							</li>
						@endcan
						@can('product-comments.show')
							<li class="{{ request()->segment(2)=='product-comment'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('product-comment.index')}}"><i
											class="fas fa-comment-alt"
									></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Comments')}}</span></a>
							</li>
						@endcan
						@can('product-reviews.show')
							<li class="{{ request()->segment(2)=='review-product'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('product.getRatingReview')}}"><i
											class="fas fa-comment-alt"
									></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Reviews')}}</span></a>
							</li>
						@endcan
					</ul>
				</li>
			@endif

			@if(auth('admin')->user()->can('service.show') or auth('admin')->user()->can('service-inquiry.show') or auth('admin')->user()->can('service-comments.show') or auth('admin')->user()->can('review.show'))
				<li class=" nav-item"><a class="d-flex align-items-center" href="#"> <i class="fab fa-servicestack"></i>
						<span class="menu-title text-truncate" data-i18n="User">{{__('Service Management')}}</span></a>
					<ul class="menu-content">
						@can('service.show')
							<li class="{{ request()->segment(2)=='service'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('service.index')}}"
								><i class="fas fa-user"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Service')}}</span></a>
							</li>
						@endcan
						@can('service-feature.show')
							<li class="{{ request()->segment(2)=='service-feature'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('service.feature.list')}}"
								><i class="fas fa-user"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Feature Service')}}</span></a>
							</li>
						@endcan
						@can('service-sponsor.show')
							<li class="{{ request()->segment(2)=='service-sponsor'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('service.sponsor.list')}}"
								><i class="fas fa-user"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Sponsor Service')}}</span></a>
							</li>
						@endcan

						@can('service-comments.show')
							<li class="{{ request()->segment(2)=='service-comment'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('service-comment.index')}}"
								><i class="fas fa-comment-alt"></i><span class="menu-title text-truncate"
							                                             data-i18n="Home"
									>{{__('Comments')}}</span></a>
							</li>
						@endcan

						@can('service-inquiry.show')
							<li class="{{ request()->segment(2)=='service-inquiry'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('service-inquiry.index')}}"
								><i class="fas fa-comment-alt"></i><span class="menu-title text-truncate"
							                                             data-i18n="Home"
									>{{__('Inquiries')}}</span></a>
							</li>
						@endcan
						@can('service-reviews.show')
							<li class="{{ request()->segment(2)=='review-service'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('service.getRatingReview')}}"><i
											class="far fa-star"
									></i>
									<span class="menu-title text-truncate" data-i18n="Home">{{__('Reviews')}}</span></a>
							</li>
						@endcan
					</ul>
				</li>
			@endif
            @if(Gate::check('organization.show') || Gate::check('organization-feature.show') || Gate::check('organization-sponsor.show') || Gate::check('media.show') || Gate::check('gallery.show') || Gate::check('organization.edit')  || Gate::check('organization.delete') || Gate::check('organization.approval') || Gate::check('organization.email-verify')  || Gate::check('organization-employee.show') || Gate::check('organization-employee.edit') || Gate::check('organization-product.show') || Gate::check('organization-service.show') || Gate::check('organization-gallery.show') || Gate::check('organization.block') || Gate::check('organization-media.show') || Gate::check('organization.inactive') || Gate::check('organization.renew'))
				<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-store"></i> <span
								class="menu-title text-truncate" data-i18n="User"
						>{{__('Organization Management')}}</span></a>
					<ul class="menu-content">
						<li class="{{ request()->segment(2)=='organization'?'active':'' }} nav-item">
							<a class="d-flex align-items-center" href="{{route('organization.index')}}"><i
										class="fas fa-sitemap"
								></i><span class="menu-title text-truncate" data-i18n="Home"
								>{{__('Organization')}}</span></a>
						</li>
						@can('organization-feature.show')
							<li class="{{ request()->segment(2)=='feature-organization'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('organization.feature.list')}}"><i
											class="fas fa-sitemap"
									></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Feature Organization')}}</span></a>
							</li>
						@endcan
						@can('organization-sponsor.show')
							<li class="{{ request()->segment(2)=='sponsor-organization'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('organization.sponsor.list')}}"><i
											class="fas fa-sitemap"
									></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Sponsor Organization')}}</span></a>
							</li>
						@endcan
						@can('media.show')
							<li class="{{ request()->segment(2)=='media-manage'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('media.requests')}}">
									<i class="fas fa-video"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Media Manage')}}</span></a>
							</li>
						@endcan
						@can('organization-gallery.show')
							<li class="{{ request()->segment(2)=='gallery-manage'?'active':'' }} nav-item">
								<a class="d-flex align-items-center" href="{{route('gallery.requests')}}">
									<i class="fas fa-images"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Gallery Manage')}}</span></a>
							</li>
						@endcan
                        <li class="{{ Route::currentRouteName()=='organizations.report' ? 'active':'' }} nav-item">
                            <a class="d-flex align-items-center" href="{{route('organizations.report')}}"><i class="fa fa-list"></i><span
                                    class="menu-title text-truncate" data-i18n="Home">{{__('Report')}}</span></a>
                        </li>
					</ul>
				</li>
            @endif
			@can('order.show')
				<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fab fa-first-order"></i>
						<span class="menu-title text-truncate" data-i18n="User">{{__('Order Management')}}</span></a>
					<ul class="menu-content">
						<li class="{{ Route::currentRouteName()=='order.product.list' && request()->get('status')=='all'?'active':'' }} nav-item">
							<a class="d-flex align-items-center"
							   href="{{route('order.product.list', ['status'=>'all'])}}"
							><i class="fas fa-list"></i><span class="menu-title text-truncate" data-i18n="Home"
								>{{__('All Orders')}}</span></a>
						</li>
						<li class="{{ Route::currentRouteName()=='order.product.list' && request()->get('status')=='pending'?'active':'' }} nav-item">
							<a class="d-flex align-items-center"
							   href="{{route('order.product.list', ['status'=>'pending'])}}"
							><i class="fas fa-pause-circle" style="color: yellow;"></i><span
										class="menu-title text-truncate" data-i18n="Home"
								>{{__('Pending Orders')}}</span></a>
						</li>
						<li class="{{ Route::currentRouteName()=='order.product.list' && request()->get('status')=='confirmed'?'active':'' }} nav-item">
							<a class="d-flex align-items-center"
							   href="{{route('order.product.list', ['status'=>'confirmed'])}}"
							><i class="fas fa-clipboard-check" style="color: green;"></i><span
										class="menu-title text-truncate" data-i18n="Home"
								>{{__('Confirmed Orders')}}</span></a>
						</li>
						<li class="{{ Route::currentRouteName()=='order.product.list' && request()->get('status')=='cancelled'?'active':'' }} nav-item">
							<a class="d-flex align-items-center"
							   href="{{route('order.product.list', ['status'=>'cancelled'])}}"
							><i class="far fa-window-close" style="color: red;"></i><span
										class="menu-title text-truncate" data-i18n="Home"
								>{{__('Cancelled Orders')}}</span></a>
						</li>
                        <li class="{{ Route::currentRouteName()=='order.product.report' ? 'active':'' }} nav-item">
                            <a class="d-flex align-items-center"
                               href="{{route('order.product.report')}}"
                            ><i class="fa fa-list"></i><span
                                    class="menu-title text-truncate" data-i18n="Home"
                                >{{__('Report')}}</span></a>
                        </li>
					</ul>
				</li>
			@endcan
			@can('buyer.show')
				<li class="{{ request()->segment(2)=='buyer'?'active':'' }} nav-item"><a
							class="d-flex align-items-center" href="{{route('buyer.index')}}"
					><i class="fas fa-user-secret"></i><span class="menu-title text-truncate" data-i18n="Home"
						>{{__('All Buyers')}}</span></a>
				</li>
			@endcan
			@can('seller.show')
				<li class="{{ Route::currentRouteName()=='seller.list'?'active':'' }} nav-item"><a
							class="d-flex align-items-center" href="{{route('seller.list')}}"
					><i class="fas fa-user-secret"></i><span class="menu-title text-truncate" data-i18n="Home"
						>{{__('All Seller')}}</span></a>
				</li>
			@endcan

			{{--			@can('can.email')--}}
			{{--				<li class="{{ request()->segment(2)=='mail'?'active':'' }} nav-item">--}}
			{{--					<a class="d-flex align-items-center" href="{{route('mail.index')}}">--}}
			{{--						<i class="fas fa-envelope"></i><span class="menu-title text-truncate" data-i18n="Home">{{__('Mails')}}</span></a>--}}
			{{--				</li>--}}
			{{--			@endcan--}}

			@if(Gate::check('user.show') || Gate::check('role.show'))
				<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-user-shield"></i>
						<span class="menu-title text-truncate" data-i18n="User">{{__('Access Control')}}</span></a>
					<ul class="menu-content">
						@can('user.show')
							<li class="{{ request()->segment(2)=='user'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('user.index')}}"
								><i class="fas fa-user"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('User')}}</span></a>
							</li>
						@endcan
						@can('role.show')
							<li class="{{ request()->segment(2)=='role'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('role.index')}}"
								><i class="fas fa-users-cog"></i><span class="menu-title text-truncate"
							                                           data-i18n="Home"
									>{{__('Role')}}</span></a>
							</li>
						@endcan
					</ul>
				</li>
			@endif
			@if(Gate::check('product-request.show') || Gate::check('service-request.show') || Gate::check('feature-request.show')||Gate::check('sponsor-request.show'))
				<li class=" nav-item"><a class="d-flex align-items-center" href="#"> <i class="fas fa-shopping-basket"
						></i>
						<span class="menu-title text-truncate" data-i18n="User">{{__('Buy Requests')}}</span></a>
					<ul class="menu-content">
						@can('product-request.show')
							<li class="{{ request()->segment(2)=='buy-request-product-list'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('buyer.request.product.index')}}"
								><i class="fas fa-user"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Product')}}
                                    </span>
                                </a>
							</li>
						@endcan
						@can('service-request.show')
							<li class="{{ request()->segment(2)=='buy-request-service-list'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('buyer.request.service.index')}}"
								><i class="fas fa-user"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Service')}}
                                    </span>
                                </a>
							</li>
						@endcan
						@can('feature-request.show')
							<li class="{{ request()->segment(2)=='feature-buyer-request'?'active':'' }} nav-item"><a
										class="d-flex align-items-center" href="{{route('buyer.request.feature')}}"
								><i class="fas fa-user"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('Feature Request')}}</span></a>
							</li>
						@endcan
					</ul>
				</li>
			@endif
			@can('blog.show')
				<li class="{{ request()->segment(2)=='blog'?'active':'' }} nav-item"><a
							class="d-flex align-items-center" href="{{route('blog.index')}}"
					><i class="fas fa-user"></i><span class="menu-title text-truncate" data-i18n="Home"
						>{{__('Blog')}}</span></a>
				</li>
			@endcan

			@can('login-activity.show')
				<li class="{{ request()->segment(2)=='login-activity'?'active':'' }} nav-item">
					<a class="d-flex align-items-center" href="{{route('login-activity')}}">
						<i class="fas fa-lock"></i><span class="menu-title text-truncate" data-i18n="Home"
						>{{__('login Activity')}}</span></a>
				</li>
			@endcan
            @can('search-history.show')
                <li class="{{ Route::currentRouteName()=='searchHistory.search.list'?'active':'' }} nav-item">
                    <a class="d-flex align-items-center" href="{{route('searchHistory.search.list')}}">
                        <i class="fas fa-search"></i><span class="menu-title text-truncate" data-i18n="Home"
                        >{{__('Search History')}}</span></a>
                </li>
            @endcan
            @can('currency.show')
            <li class="{{ Request::segment(2)=='currency'?'active':'' }} nav-item">
                <a class="d-flex align-items-center" href="{{route('currency.index')}}">
                    <i class="fas fa-dollar-sign"></i><span class="menu-title text-truncate" data-i18n="Home"
                    >{{__('Currency')}}</span></a>
            </li>
            @endcan
            @if(Gate::check('web-setting.show') || Gate::check('setting-rules.show'))
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"> <i class="fab fa-first-order"></i>
                        <span class="menu-title text-truncate" data-i18n="User">{{__('Settings')}}</span></a>
                    <ul class="menu-content">
                        @can('web-setting.show')
                            <li class="{{ request()->segment(2)=='customization'?'active':'' }} nav-item">
                                <a class="d-flex align-items-center" href="{{route('customization.index')}}">
                                    <i class="fas fa-cogs"></i><span class="menu-title text-truncate" data-i18n="Home"
                                    >{{__('Client-Site Settings')}}</span></a>
                            </li>
                        @endcan
                        @can('setting-rules.show')
                            <li class="{{ request()->segment(2)=='settings'?'active':'' }} nav-item">
                                <a class="d-flex align-items-center" href="{{route('admin.settings')}}"><i
                                        class="fas fa-sitemap"
                                    ></i><span class="menu-title text-truncate" data-i18n="Home">{{__('Rules')}}</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if(Gate::check('all-wallet.show') || Gate::check('wallet-setting.show')|| Gate::check('withdrawal.request.show')
             || Gate::check('self-statement.show')|| Gate::check('account-transaction.show')|| Gate::check('payment-request.show')||  Gate::check('gift-balance.show'))
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"> <i class="fas fa-wallet"></i>
                        <span class="menu-title text-truncate" data-i18n="User">{{__('Wallet Management')}}</span></a>
                    <ul class="menu-content">
                        @can('wallet-setting.show')
                        <li class="{{ Route::currentRouteName()=='wallet.create'?'active':'' }} nav-item">
                            <a class="d-flex align-items-center" href="{{route('wallet.create')}}">
                                <i class="fas fa-cogs"></i><span class="menu-title text-truncate" data-i18n="Home"
                                >{{__('Settings')}}</span></a>
                        </li>
                        @endcan
                        @can('self-statement.show')
                        <li class="{{ Route::currentRouteName()=='self.wallet.statement'?'active':'' }} nav-item">
                            <a class="d-flex align-items-center" href="{{route('self.wallet.statement')}}">
                                <i class="fas fa-cogs"></i><span class="menu-title text-truncate" data-i18n="Home"
                                >{{__('Self Statement')}}</span></a>
                        </li>
                       @endcan
                            @can('account-transaction.show')
                        <li class="{{ request()->segment(2)=='account-transaction-details'||request()->segment(2)=='account-transaction'?'active':'' }} nav-item">
                            <a class="d-flex align-items-center" href="{{ route('account.transaction.statement') }}">
                                <i class="fas fa-cogs"></i><span class="menu-title text-truncate" data-i18n="Home"
                                >{{__('Account Transaction')}}</span></a>
                        </li>
                            @endcan
                            @can('payment-request.show')
                        <li class="{{ request()->segment(2)=='wallet-request'?'active':'' }} nav-item">
                            <a class="d-flex align-items-center" href="{{ route('wallet.request') }}"><i
                                    class="fas fa-envelope-open-text"
                                ></i>
                                <span class="menu-title text-truncate" data-i18n="Home">{{__('Payment Requests')}} <span class="menu-title text-truncate badge badge-pill bg-danger">{{ \App\Models\AccountTransaction::where('status', 'pending')->where('sender_type', '!=', null)->count() }}</span></span></a>
                        </li>
                            @endcan
                            @can('all-wallet.show')
                        <li class="{{ Route::currentRouteName()=='wallet.index'||request()->segment(2)=='wallet-statement'?'active':'' }} nav-item">
                            <a class="d-flex align-items-center" href="{{route('wallet.index')}}"><i
                                    class="fas fa-sitemap"
                                ></i><span class="menu-title text-truncate" data-i18n="Home">{{__('All Wallet')}}</span></a>
                        </li>
                            @endcan
                            @can('gift-balance.show')
                        <li class="{{ request()->segment(2)=='wallet-gift'?'active':'' }} nav-item">
                            <a class="d-flex align-items-center" href="{{route('gift.page')}}"><i
                                    class="fas fa-sitemap"
                                ></i><span class="menu-title text-truncate" data-i18n="Home">{{__('Gift')}}</span></a>
                        </li>
                            @endcan
                            @can('withdrawal.request.show')
                        <li class="nav-item {{ request()->segment(2)=='wallet-withdraw-request'?'active':'' }}">
                            <a class="d-flex align-items-center" href="{{ route('withdraw.requests') }}">
                                <i class="fas fa-sitemap"></i>
                                <span class="menu-title text-truncate" data-i18n="Home">{{__('Withdraw Request')}}
                                </span>
                            </a>
                        </li>
                       @endcan
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div><!-- END: Main Menu-->
