{{--@extends('layouts.agent')--}}

{{--@section('breadcrumb')--}}
{{--	<h2 class="content-header-title float-left mb-0"><i class="far fa-bell"></i> Notifications</h2>--}}
{{--	<div class="breadcrumb-wrapper">--}}
{{--		<ol class="breadcrumb">--}}
{{--			<li class="breadcrumb-item"><a href="{{ route('agent.home') }}">Home</a></li>--}}
{{--			<li class="breadcrumb-item active">Notifications</li>--}}
{{--		</ol>--}}
{{--	</div>--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--	<div class="email-application">--}}
{{--		<div class="content-overlay"></div>--}}
{{--		<div class="content-area-wrapper">--}}
{{--			<div class="content-right full-width">--}}
{{--				<div class="content-wrapper">--}}
{{--					<div class="content-header row">--}}
{{--					</div>--}}
{{--					<div class="content-body">--}}
{{--						<div class="body-content-overlay"></div>--}}
{{--						<!-- Email list Area -->--}}
{{--						<div class="email-app-list">--}}
{{--							<!-- Email search starts -->--}}
{{--							<div class="app-fixed-search d-flex align-items-center">--}}
{{--								<div class="sidebar-toggle d-block d-lg-none ml-1">--}}
{{--									<i data-feather="menu" class="font-medium-5"></i>--}}
{{--								</div>--}}
{{--								<div class="d-flex align-content-center justify-content-between w-100">--}}
{{--									<div class="input-group input-group-merge">--}}
{{--										<div class="input-group-prepend">--}}
{{--											<span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>--}}
{{--										</div>--}}
{{--										<input type="text" class="form-control" id="email-search" placeholder="Search email" aria-label="Search..." aria-describedby="email-search" />--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<!-- Email search ends -->--}}
{{--							<form action="{{route('agent.delete.notification')}}" method="post">--}}
{{--							@csrf--}}
{{--							<!-- Email actions starts -->--}}
{{--								<div class="app-action">--}}
{{--									<div class="action-left">--}}
{{--										<div class="custom-control custom-checkbox selectAll">--}}
{{--											<input type="checkbox" class="custom-control-input" id="selectAllCheck" />--}}
{{--											<label class="custom-control-label font-weight-bolder pl-25" for="selectAllCheck">Select All</label>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--									<div class="action-right">--}}
{{--										<ul class="list-inline m-0">--}}
{{--											<li class="list-inline-item notification-delete">--}}
{{--												<button class="btn" type="submit"><i class="fa fa-trash-alt"></i></button>--}}
{{--											</li>--}}
{{--										</ul>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--								<!-- Email actions ends -->--}}

{{--								<!-- Email list starts -->--}}
{{--								<div class="email-user-list">--}}
{{--									<ul class="email-media-list">--}}
{{--										@foreach($notifications as $notification)--}}
{{--											<li class="media @if($notification['read_at']) mail-read @endif">--}}
{{--												<div class="media-left pr-50">--}}
{{--													<div class="avatar">--}}
{{--													</div>--}}
{{--													<div class="user-action">--}}
{{--														<div class="custom-control custom-checkbox">--}}
{{--															<input type="checkbox" class="custom-control-input checkbox-input" name="id[{{$notification->id}}]" data-id="{{$notification->id}}" id="customCheck{{$notification->id}}" />--}}
{{--															<label class="custom-control-label" for="customCheck{{$notification->id}}"></label>--}}
{{--														</div>--}}
{{--														<span class="email-favorite"><i data-feather="star"></i></span>--}}
{{--													</div>--}}
{{--												</div>--}}
{{--												<div class="media-body">--}}
{{--													<a href="{{ route('agent.mark-as-read',[$notification->id, $notification->data['route_name'], $notification->data['product_id']??"null"]) }}"><div class="mail-details">--}}
{{--															<div class="mail-items">--}}
{{--																<h5 class="mb-25">{{$notification->data['name']}}</h5>--}}
{{--																<span class="text-truncate">{{$notification->data['data']}} {{$notification->data['notificationOn']}}</span>--}}
{{--															</div>--}}
{{--															<div class="mail-meta-item">--}}
{{--																<span class="mail-date">{{$notification->created_at->diffForHumans()}}</span>--}}
{{--															</div>--}}
{{--														</div>--}}
{{--													</a>--}}
{{--												</div>--}}
{{--											</li>--}}
{{--										@endforeach--}}
{{--									</ul>--}}
{{--									<div class="no-results">--}}
{{--										<h5>No Items Found</h5>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--								<!-- Email list ends -->--}}
{{--							</form>--}}
{{--						</div>--}}
{{--						<!--/ Email list Area -->--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--@endsection--}}
{{--@push('scripts')--}}
{{--	<script src="{{asset('admin/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>--}}


{{--@endpush--}}