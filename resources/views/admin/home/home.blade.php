@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endpush
@section('breadcrumb')
    <div class="col-12">
        <h2 class="content-header-title float-left mb-0">{{__('Home')}}</h2>
    </div>
@endsection
@section('content')
    @can('dashboard.show')
        <section id="chartjs-chart">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            @if($products->count() > 0)
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">{{__('Trending products')}}</th>
                                        </tr>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Views')}}</th>
	                                        <th>{{__('Clicks')}}</th>
	                                        <th>{{__('Inquiries')}}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-1">
                                                            <div>
                                                                <img
                                                                    src="{{asset(config('imagepath.feature').$product->featured_image)}}"
                                                                    width="30px">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="font-weight-bolder">
                                                                <a href="{{route('product.show', encrypt($product->id))}}">{{$product->name}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="font-weight-bolder">{{$product->report->view ?? 0}}</div>
                                                    </div>
                                                </td>
	                                            <td>
		                                            <div class="d-flex align-items-center">
			                                            <div class="font-weight-bolder">{{$product->report->click ?? 0}}</div>
		                                            </div>
	                                            </td>
	                                            <td>
		                                            <div class="d-flex align-items-center">
			                                            <div class="font-weight-bolder">{{$product->report->inquiry ?? 0}}</div>
		                                            </div>
	                                            </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('product.index')}}" type="button"
                                                       class="btn btn-primary waves-effect waves-float waves-light">{{__('View all')}}</a>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="py-3 px-2">
                                    <b class="text-center">{{__('Sorry! No result found')}}</b>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            @if($products->count() > 0)
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">{{__('Trending services')}}</th>
                                        </tr>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Views')}}</th>
                                            <th>{{__('Clicks')}}</th>
                                            <th>{{__('Inquiries')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($services as $service)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-1">
                                                            <div>
                                                                <img src="{{asset(config('imagepath.feature').$service->featured_image ?? '')}}" width="30px">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="font-weight-bolder">
                                                                <a href="{{route('service.show', encrypt($service->id))}}">{{$service->name}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="font-weight-bolder">{{$service->report->view ?? 0}}</div>
                                                    </div>
                                                </td>
	                                            <td>
		                                            <div class="d-flex align-items-center">
			                                            <div class="font-weight-bolder">{{$service->report->click ?? 0}}</div>
		                                            </div>
	                                            </td>
	                                            <td>
		                                            <div class="d-flex align-items-center">
			                                            <div class="font-weight-bolder">{{$service->report->inquiry ?? 0}}</div>
		                                            </div>
	                                            </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="py-3 px-2">
                                    <b class="text-center">{{__('Sorry! No result found')}}</b>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endcan
@endsection
@push('scripts')


@endpush
