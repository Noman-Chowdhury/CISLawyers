@extends('layouts.agent')

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endpush
@section('breadcrumb')
	<div class="col-12">
		<h2 class="content-header-title float-left mb-0">Home</h2>
		<div class="breadcrumb-wrapper">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a>
				</li>
				<li class="breadcrumb-item active">Index
				</li>
			</ol>
		</div>
	</div>
@endsection
@section('content')

	<section id="chartjs-chart">
		<div class="row">
			<!--Bar Chart Start -->
			<div class="col-xl-6 col-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
						<div class="header-left">
							<h4 class="card-title">Latest Visitors</h4>
						</div>
						<div class="header-right d-flex align-items-center mt-sm-0 mt-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
							<input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pr-0 flatpickr-input" placeholder="YYYY-MM-DD" readonly="readonly">
						</div>
					</div>
					<div class="card-body">
						<div style="height:400px"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas class="bar-chart-ex chartjs chartjs-render-monitor" data-height="400" width="738" height="400" style="display: block; width: 738px; height: 400px;"></canvas></div>
					</div>
				</div>
			</div>
			<!-- Bar Chart End -->

			<!-- Horizontal Bar Chart Start -->
			<div class="col-xl-6 col-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
						<div class="header-left">
							<p class="card-subtitle text-muted mb-25">Latest Profit</p>
							<h4 class="card-title">$74,123</h4>
						</div>
						<div class="header-right d-flex align-items-center mt-sm-0 mt-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
							<input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pr-0 flatpickr-input" placeholder="YYYY-MM-DD" readonly="readonly">
						</div>
					</div>
					<div class="card-body">
						<div style="height:400px"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas class="horizontal-bar-chart-ex chartjs chartjs-render-monitor" data-height="400" width="738" height="400" style="display: block; width: 738px; height: 400px;"></canvas></div>
					</div>
				</div>
			</div>
			<!-- Horizontal Bar Chart End -->
		</div>
	</section>

@endsection
@push('scripts')

	<script src="{{asset('admin/app-assets/vendors/js/charts/chart.min.js')}}"></script>
	<script src="{{asset('admin/app-assets/js/scripts/charts/chart-chartjs.js')}}"></script>
	<script src="{{asset('admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

@endpush
