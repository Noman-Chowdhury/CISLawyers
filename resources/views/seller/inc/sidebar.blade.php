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
				><span class="menu-title text-truncate text-center">Wallet: <br>{{ number_format(\App\Models\Wallet::where(['walletable_type'=>\App\Models\Admin\Organizations::class,'walletable_id'=>auth('seller')->user()->organization_id])->first()->balance??0, 2,) }} BDT</span></a></li>
			@can('dashboard.show')
				<li class="{{ request()->segment(2)=='home' ? 'active' :'' }} nav-item"><a
							class="d-flex align-items-center" href="{{ route('seller.home') }}"
					><i data-feather="home"></i><span class="menu-title text-truncate">{{__('Dashboard')}}</span></a>
				</li>
			@endcan
			<li class="nav-item"><a class="d-flex align-items-center"
			                        href="{{ url('sp',auth('seller')->user()->organization->slug) }}" target="_blank"
				><i data-feather="globe"></i><span class="menu-title text-truncate"
					>{{__('View Source Page')}}</span></a></li>

			@can('profile.show')
				<li class=" nav-item"><a class="d-flex align-items-center" href="#"><span
								class="menu-title text-truncate" data-i18n="User"
						><i class="far fa-building"></i>{{__('Source Profile')}}</span></a>
					<ul class="menu-content">
						<li class="{{ request()->segment(2)=='company' ? 'active' :'' }} nav-item"><a
									class="d-flex align-items-center" href="{{ route('seller.company.index') }}"
							><i class="fas fa-pencil-alt"></i><span class="menu-title text-truncate"
								>{{__('Edit')}}</span></a></li>

						<li class="{{ request()->segment(2)=='company-address' ? 'active' :'' }} nav-item"><a
									class="d-flex align-items-center" href="{{ route('seller.company-address.create') }}"
							><i class="far fa-building"></i><span class="menu-title text-truncate"
								>{{__('Add Address')}}</span></a></li>

						<li class="{{ Route::currentRouteName()=='seller.company.statistics'?'active':'' }} nav-item"><a
									class="d-flex align-items-center" href="{{ route('seller.company.statistics') }}"
							><i class="far fa-building"></i><span class="menu-title text-truncate"
								>{{__('Statistics')}}</span></a></li>

						@if (auth('seller')->user()->organization->latestFeature() && auth('seller')->user()->organization->latestFeature()->status !== 'pending')
							<li class="{{ request()->segment(2)=='feature-statistics' ? 'active' :'' }} nav-item"><a
										class="d-flex align-items-center"
										href="{{ route('seller.company.feature.statistics') }}"
								><i
											class="far fa-building"
									></i><span
											class="menu-title text-truncate"
									>{{__('Feature statistics')}}</span></a></li>
						@endif
						@if (auth('seller')->user()->organization->latestSponsor() && auth('seller')->user()->organization->latestSponsor()->status !== 'pending')
							<li class="{{ request()->segment(2)=='sponsor-statistics' ? 'active' :'' }} nav-item"><a
										class="d-flex align-items-center"
										href="{{ route('seller.company.sponsor.statistics') }}"
								><i
											class="far fa-building"
									></i><span
											class="menu-title text-truncate"
									>{{__('Sponsor statistics')}}</span></a></li>
						@endif
					</ul>
				</li>
			@endcan
			@if(auth('seller')->user()->organization->status == 'active')
				@if(auth('seller')->user()->organization->sector === 'product')
					@if(auth('seller')->user()->can('product.show') or auth('seller')->user()->can('product-inquiry.show') or auth('seller')->user()->can('product.comments') or auth('seller')->user()->can('review.show'))
						<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
										class="fas fa-baby-carriage"
								></i><span class="menu-title text-truncate" data-i18n="User"
								>{{__('Product Management')}}</span></a>
							<ul class="menu-content">
								@can('product.show')
									<li class="{{ request()->segment(2)=='product' ? 'active' :'' }} nav-item"><a
												class="d-flex align-items-center" href="{{ route('seller.product.index') }}"
										><i class="fab fa-product-hunt"></i><span class="menu-title text-truncate"
									                                              data-i18n="Home"
											>{{__('Product')}}</span></a></li>
								@endcan
								@can('product.feature')
									<li class="{{ request()->segment(2)=='product-feature' ? 'active' :'' }} nav-item">
										<a class="d-flex align-items-center"
										   href="{{ route('seller.product.feature.list') }}"
										><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
										                                          data-i18n="Home"
											>{{__('Feature Product')}}</span></a></li>
								@endcan
								@can('product.sponsor')
									<li class="{{ request()->segment(2)=='product-sponsor' ? 'active' :'' }} nav-item">
										<a class="d-flex align-items-center"
										   href="{{ route('seller.product.sponsor.list') }}"
										><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
										                                          data-i18n="Home"
											>{{__('Sponsor Product')}}</span></a></li>
								@endcan
								@can('product-inquiry.show')
									<li class="{{ request()->segment(2)=='inquiry' ? 'active' :'' }} nav-item"><a
												class="d-flex align-items-center" href="{{ route('seller.inquiry.index') }}"
										><i class="fas fa-search-minus"></i><span class="menu-title text-truncate"
									                                              data-i18n="Home"
											>{{__('Inquiry')}}</span></a></li>
								@endcan
								@can('product.comments')
									<li class="{{ request()->segment(2)=='comment' ? 'active' :'' }} nav-item"><a
												class="d-flex align-items-center" href="{{route('seller.comment.index')}}"
										><i class="fas fa-comments"></i><span class="menu-title text-truncate"
									                                          data-i18n="Home"
											>{{__('Comments')}}</span></a></li>
								@endcan
								@can('product.customerReview')
									<li class="{{ request()->segment(3)=='product' ? 'active' :''}} nav-item"><a
												class="d-flex align-items-center"
												href="{{route('seller.customer.review.product')}}"
										><i class="fas fa-eye"></i><span class="menu-title text-truncate"
									                                     data-i18n="Home"
											>{{__('Customer Review')}}</span></a></li>
								@endcan
							</ul>
						</li>
					@endif
				@endif
				@if(auth('seller')->user()->organization->sector === 'service')
					@if(auth('seller')->user()->can('service.show') or auth('seller')->user()->can('review.show') or auth('seller')->user()->can('service-inquiry.show') or auth('seller')->user()->can('service.comments'))
						<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
										class="fas fa-phone-volume"
								></i> <span class="menu-title text-truncate" data-i18n="User"
								>{{__('Service Management')}}</span></a>
							<ul class="menu-content">
								@can('service.show')
									<li class="{{ request()->segment(2)=='service' ? 'active' :'' }} nav-item"><a
												class="d-flex align-items-center" href="{{ route('seller.service.index') }}"
										><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
									                                              data-i18n="Home"
											>{{__('Service')}}</span></a></li>
								@endcan
								@can('service.feature')
									<li class="{{ request()->segment(2)=='service-feature' ? 'active' :'' }} nav-item">
										<a class="d-flex align-items-center"
										   href="{{ route('seller.service.feature.list') }}"
										><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
										                                          data-i18n="Home"
											>{{__('Feature Service')}}</span></a></li>
								@endcan
								@can('service.sponsor')
									<li class="{{ request()->segment(2)=='service-sponsor' ? 'active' :'' }} nav-item">
										<a class="d-flex align-items-center"
										   href="{{ route('seller.service.sponsor.list') }}"
										><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
										                                          data-i18n="Home"
											>{{__('Sponsor Service')}}</span></a></li>
								@endcan
								@can('service-inquiry.show')
									<li class="{{ request()->segment(2)=='service-inquiry' ? 'active' :'' }} nav-item">
										<a class="d-flex align-items-center"
										   href="{{ route('seller.service-inquiry.index') }}"
										><i class="fas fa-search-minus"></i><span class="menu-title text-truncate"
										                                          data-i18n="Home"
											>{{__('Inquiry')}}</span></a></li>
								@endcan
								@can('service.comments')
									<li class="{{ request()->segment(2)=='service-comment' ? 'active' :'' }} nav-item">
										<a class="d-flex align-items-center"
										   href="{{route('seller.service-comment.index')}}"
										><i class="fas fa-comments"></i><span class="menu-title text-truncate"
										                                      data-i18n="Home"
											>{{__('Comments')}}</span></a></li>
								@endcan
								@can('service.customerReview')
									<li class="{{ request()->segment(3)=='service' ? 'active' :''}} nav-item"><a
												class="d-flex align-items-center"
												href="{{route('seller.customer.review.service')}}"
										><i class="fas fa-eye"></i><span class="menu-title text-truncate"
									                                     data-i18n="Home"
											>{{__('Customer Review')}}</span></a></li>
								@endcan
							</ul>
						</li>
					@endif
				@endif
				@can('order.show')
					@if(auth('seller')->user()->organization->sector === 'product')
						<li class=" nav-item {{Route::currentRouteName()=='seller.order.product.list' ?'active':''}}"><a
									class="d-flex align-items-center" href="#"
							><i class="fab fa-first-order"></i> <span class="menu-title text-truncate" data-i18n="User"
								>{{__('Order Management')}}</span></a>
							<ul class="menu-content">
								<li class="{{ Route::currentRouteName()=='seller.order.product.list' && request()->get('status')=='all'?'active':'' }} nav-item">
									<a class="d-flex align-items-center"
									   href="{{route('seller.order.product.list', ['status'=>'all'])}}"
									><i class="fas fa-list"></i><span class="menu-title text-truncate" data-i18n="Home"
										>{{__('All Orders')}}</span></a>
								</li>
								<li class="{{ Route::currentRouteName()=='seller.order.product.list' && request()->get('status')=='pending'?'active':'' }} nav-item">
									<a class="d-flex align-items-center"
									   href="{{route('seller.order.product.list', ['status'=>'pending'])}}"
									><i class="fas fa-pause-circle" style="color: yellow;"></i><span
												class="menu-title text-truncate" data-i18n="Home"
										>{{__('Pending Orders')}}</span></a>
								</li>
								<li class="{{ Route::currentRouteName()=='seller.order.product.list' && request()->get('status')=='confirmed'?'active':'' }} nav-item">
									<a class="d-flex align-items-center"
									   href="{{route('seller.order.product.list', ['status'=>'confirmed'])}}"
									><i class="fas fa-clipboard-check" style="color: green;"></i><span
												class="menu-title text-truncate" data-i18n="Home"
										>{{__('Confirmed Orders')}}</span></a>
								</li>
								<li class="{{ Route::currentRouteName()=='seller.order.product.list' && request()->get('status')=='cancelled'?'active':'' }} nav-item">
									<a class="d-flex align-items-center"
									   href="{{route('seller.order.product.list', ['status'=>'cancelled'])}}"
									><i class="far fa-window-close" style="color: red;"></i><span
												class="menu-title text-truncate" data-i18n="Home"
										>{{__('Cancelled Orders')}}</span></a>
								</li>
							</ul>
						</li>
					@endif
				@endcan
				@if(auth('seller')->user()->can('employee.show') or auth('seller')->user()->can('roles.show'))
					<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-user-shield"
							></i> <span class="menu-title text-truncate" data-i18n="User"
							> {{__('Access Control')}}</span></a>
						<ul class="menu-content">
							@can('roles.show')
								<li class="{{ request()->segment(2)=='roles'? 'active' :'' }} nav-item"><a
											class="d-flex align-items-center" href="{{route('seller.roles.index')}}"
									><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
								                                              data-i18n="Home"
										>{{__('Role')}}</span></a>
								</li>
							@endcan
							@can('employee.show')
								<li class="{{ request()->segment(2)=='user'?'active':'' }} nav-item"><a
											class="d-flex align-items-center" href="{{route('seller.user.index')}}"
									><i class="fas fa-user-tie"></i><span class="menu-title text-truncate"
								                                          data-i18n="Home"
										>{{__('Employee')}}</span></a>
								</li>
							@endcan
						</ul>
					</li>
				@endif
				@if(Gate::check('home.show') || Gate::check('gallery.show') || Gate::check('media.show') || Gate::check('faqs.show') || Gate::check('tos.show') || Gate::check('about.show') || Gate::check('blog.show') || Gate::check('client.show'))
					<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-pager"></i>
							<span
									class="menu-title text-truncate" data-i18n="User"
							>{{__('Source Page')}}</span></a>
						<ul class="menu-content">
							@can('home.show')
								<li class="{{ request()->segment(2)=='customization'?'active':'' }} nav-item"><a
											class="d-flex align-items-center" href="{{route('seller.customization.index')}}"
									><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
								                                              data-i18n="Home"
										>{{__('Home')}}</span></a></li>
							@endcan
							@can('gallery.show')
								<li class="{{ request()->segment(2)=='gallery'?'active':'' }} nav-item"><a
											class="d-flex align-items-center" href="{{route('seller.gallery.index')}}"
									><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
								                                              data-i18n="Home"
										>{{__('Gallery')}}</span></a></li>
							@endcan
							@can('media.show')
								<li class="{{ request()->segment(2)=='media'?'active':'' }} nav-item"><a
											class="d-flex align-items-center" href="{{route('seller.media.index')}}"
									><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
								                                              data-i18n="Home"
										>{{__('Media')}}</span></a></li>
							@endcan
							@can('faqs.show')
								<li class="{{ request()->segment(2)=='faqs'?'active':'' }} nav-item"><a
											class="d-flex align-items-center" href="{{route('seller.faqs.index')}}"
									><i class="fas fa-question-circle"></i><span class="menu-title text-truncate"
								                                                 data-i18n="Home"
										>{{__('FAQS')}}</span></a></li>
							@endcan
							@can('tos.show')
								<li class="{{ request()->segment(2)=='tos'?'active':'' }} nav-item"><a
											class="d-flex align-items-center" href="{{route('seller.tos.index')}}"
									><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
								                                              data-i18n="Home"
										>{{__('TOS')}}</span></a></li>
							@endcan
							@can('about.show')
								<li class="{{ request()->segment(2)=='about'?'active':'' }} nav-item"><a
											class="d-flex align-items-center" href="{{route('seller.about.index')}}"
									><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
								                                              data-i18n="Home"
										>{{__('About')}}</span></a></li>
							@endcan
							@can('blog.show')
								<li class="{{ request()->segment(2)=='blog'?'active':'' }} nav-item"><a
											class="d-flex align-items-center" href="{{route('seller.blog.index')}}"
									><i class="fab fa-servicestack"></i><span class="menu-title text-truncate"
								                                              data-i18n="Home"
										>{{__('Blog')}}</span></a></li>
							@endcan
							@can('client.show')
								<li class="{{ Route::currentRouteName()=='seller.client.index'?'active':'' }}">
									<a class=" d-flex align-items-center" href="{{route('seller.client.index')}}">
										<i class="fa fa-list-alt"></i><span class="menu-item text-truncate"
										                                    data-i18n="Maintenance"
										>{{__('Client List')}}</span>
									</a>
								</li>
							@endcan
						</ul>
					</li>
				@endif
				@can('buyer-request.show')
					<li class=" nav-item"><a class="d-flex align-items-center" href="#"><span
									class="menu-title text-truncate" data-i18n="User"
							><i class="fas fa-shopping-bag"></i> {{__('Buyer Requests')}}</span></a>
						<ul class="menu-content">
							<li class="{{ request()->segment(2)=='buy-request' ? 'active' :'' }} nav-item"><a
										class="d-flex align-items-center" href="{{ route('seller.buyer.request.list') }}"
								><i class="fa fa-list"></i><span class="menu-title text-truncate" data-i18n="Home">{{__('New Requests')}}  ({{count(\App\Models\Admin\BuyRequest::doesntHave('responses')->where(['status' => 'active', 'sector' => auth('seller')->user()->organization->sector])->get('id'))}})</span></a>
							</li>
							<li class="{{ request()->segment(2)=='buy-request-response' ? 'active' :'' }} nav-item"><a
										class="d-flex align-items-center"
										href="{{ route('seller.buy.request.my_response_list') }}"
								><i class="fa fa-list"></i><span class="menu-title text-truncate" data-i18n="Home"
									>{{__('My Responses')}}</span></a>
							</li>
						</ul>
					</li>
				@endcan
				@can('message.show')
					<li class="{{ request()->segment(3)=='message'?'active':'' }}">
						<a class=" d-flex align-items-center" href="{{route('seller.organization.contact.message')}}">
							<i class="fab fa-facebook-messenger"></i><span class="menu-item text-truncate"
							                                               data-i18n="Maintenance"
							>{{__('Message')}}</span>
						</a>
					</li>
				@endcan
				@can('stock.show')
					@if(auth('seller')->user()->organization->sector === 'product')
						<li class=" nav-item"><a class="d-flex align-items-center" href="#"><span
										class="menu-title text-truncate" data-i18n="User"
								><i class="fas fa-shopping-bag"></i> {{__('Stock Management')}}</span></a>
							<ul class="menu-content">
								<li class="{{ request()->segment(2)=='stock' ? 'active' :'' }} nav-item"><a
											class="d-flex align-items-center" href="{{ route('seller.stock.index') }}"
									><i class="fa fa-list"></i><span class="menu-title text-truncate" data-i18n="Home"
										>{{__('All Stock')}} </span></a>
								</li>
							</ul>
						</li>
					@endif
				@endcan
				@if(Gate::check('payment-method.add') || Gate::check('balance.add')|| Gate::check('wallet.statement') || Gate::check('wallet.withdraw') )
					<li class=" nav-item"><a class="d-flex align-items-center" href="#"> <i class="fas fa-wallet"></i>
							<span class="menu-title text-truncate" data-i18n="User"
							>{{__('Wallet Management')}}</span></a>
						<ul class="menu-content">
							@can('payment-method.add')
								<li class="{{ Route::currentRouteName()=='seller.payment.method'?'active':'' }} nav-item">
									<a class="d-flex align-items-center" href="{{ route('seller.payment.method') }}"><i
												class="fas fa-sitemap"
										></i><span class="menu-title text-truncate" data-i18n="Home"
										>{{__('Add Payment Method')}}</span></a>
								</li>
							@endcan
							@can('balance.add')
								<li class="{{ Route::currentRouteName()=='seller.wallet.create'?'active':'' }} nav-item">
									<a class="d-flex align-items-center" href="{{ route('seller.wallet.create') }}"><i
												class="fas fa-sitemap"
										></i><span class="menu-title text-truncate" data-i18n="Home"
										>{{__('Add Balance')}}</span></a>
								</li>
							@endcan
							@can('wallet.statement')
								<li class="{{ Route::currentRouteName()=='seller.wallet.index'?'active':'' }} nav-item">
									<a class="d-flex align-items-center" href="{{ route('seller.wallet.index') }}"><i
												class="fas fa-sitemap"
										></i><span class="menu-title text-truncate" data-i18n="Home"
										>{{__('Wallet Statement')}}</span></a>
								</li>
							@endcan
							@can('wallet.withdraw')
								<li class="{{ Route::currentRouteName()=='seller.withdraw.form'?'active':'' }} nav-item">
									<a class="d-flex align-items-center" href="{{ route('seller.withdraw.form') }}"><i
												class="fas fa-sitemap"
										></i><span class="menu-title text-truncate" data-i18n="Home"
										>{{__('Withdraw Balance')}}</span></a>
								</li>
							@endcan
						</ul>
					</li>
				@endif
				<!--	Affiliate Program   -->
{{--					<li class="{{ Route::currentRouteName()=='seller.affiliate.index'?'active':'' }} nav-item">--}}
{{--						<a class="d-flex align-items-center" href="{{ route('seller.affiliate.index') }}"><i class="fab fa-affiliatetheme"></i><span class="menu-title text-truncate" data-i18n="Home"--}}
{{--							>{{__('Affiliate Program')}}</span></a>--}}
{{--					</li>--}}
			@endif
		</ul>
	</div>
</div><!-- END: Main Menu-->