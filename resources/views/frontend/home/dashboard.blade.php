@extends('layouts.admin')

@push('styles')
@endpush
@section('breadcrumb')
    <div class="col-12">
        <h2 class="content-header-title float-left mb-0">{{__('Dashboard')}}</h2>
    </div>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Admin Statistics</h4>
                            <div class="d-flex align-items-center">
                                {{--                                <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p>--}}
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{route('organization.index')}}">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="trending-up" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{\App\Models\Admin\Organizations::count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Organization</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{route('buyer.index')}}">
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="user" class="avatar-icon"></i>
                                                </div>
                                            </div>

                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{\App\Models\User::count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Customers</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{route('seller.list')}}">
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="user" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{\App\Models\Seller\Seller::count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Sellers</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <a href="{{route('service.index')}}">
                                        <div class="media">
                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{\App\Models\Seller\Service::count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Services</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0 mt-2">
                                    <a href="{{route('product.index')}}">
                                        <div class="media">
                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{\App\Models\Seller\Product::count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Products</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="media">
                                        <div class="avatar bg-light-success mr-2 mt-2">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ number_format(array_sum(\App\Models\Wallet::all()->pluck('balance')->toArray()),2) }}
                                                BDT
                                            </h4>
                                            <p class="card-text font-small-3 mb-0">Wallet Balance</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Order Statistics</h4>
                            <div class="d-flex align-items-center">
                                {{--<p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p>--}}
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{route('order.product.list', ['status'=>'all'])}}">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i class="fab fa-first-order" style="font-size: large"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{\App\Models\Invoice::count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Total Order</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{route('order.product.list', ['status'=>'pending'])}}">
                                        <div class="media">
                                            <div class="avatar bg-yahoo-info mr-2">
                                                <div class="avatar-content">
                                                    <i class="fab fa-first-order" style="font-size: large"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{\App\Models\Invoice::where('status','=', 'pending')->count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Pending Order</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{route('order.product.list', ['status'=>'confirmed'])}}">
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i class="fab fa-first-order" style="font-size: large"></i>
                                                </div>
                                            </div>

                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{\App\Models\Invoice::where('status','=', 'confirmed')->count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Confirm Order</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <a href="{{route('order.product.list', ['status'=>'cancelled'])}}">
                                        <div class="media">
                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i class="fab fa-first-order" style="font-size: large"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{\App\Models\Invoice::where('status','=', 'cancelled')->count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Cancelled Order</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="media">
                                        <div class="avatar bg-light-success mr-2 mt-2">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{number_format(\App\Models\Invoice::where('status','=', 'confirmed')->sum('payable_amount'),2)}}
                                                BDT</h4>
                                            <p class="card-text font-small-3 mb-0">Confirm Order Balance</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="media">
                                        <div class="avatar bg-light-success mr-2 mt-2">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{number_format(\App\Models\Invoice::where('status','=', 'confirmed')->whereMonth('created_at' , Carbon\Carbon::now()->month)->sum('payable_amount'),2)}}
                                                BDT</h4>
                                            <p class="card-text font-small-3 mb-0">Order Balance in this Month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row match-height">
                    <!-- Company Table Card -->
                    <div class="col-lg-6 col-12">
                        <div class="card card-company-table">
                            <a href="{{route('product.index')}}">
                                <div class="card-body p-0">
                                    @if($products->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center">{{__('Trending products')}}</th>
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
                                                                            width="30px"
                                                                        >
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
                                                                <div class="font-weight-bolder"
                                                                >{{$product->report->view ?? 0}}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="font-weight-bolder"
                                                                >{{$product->report->click ?? 0}}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="font-weight-bolder"
                                                                >{{$product->report->inquiry ?? 0}}</div>
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
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card card-company-table">
                            <a href="{{route('service.index')}}">
                                <div class="card-body p-0">
                                    @if($products->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center">{{__('Trending services')}}</th>
                                                </tr>
                                                <tr>
                                                    <th>{{__('Service Name')}}</th>
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
                                                                        <img
                                                                            src="{{asset(config('imagepath.feature').$service->featured_image ?? '')}}"
                                                                            width="30px"
                                                                        >
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
                                                                <div class="font-weight-bolder"
                                                                >{{$service->report->view ?? 0}}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="font-weight-bolder"
                                                                >{{$service->report->click ?? 0}}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="font-weight-bolder"
                                                                >{{$service->report->inquiry ?? 0}}</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{--                                            <tr>--}}
                                                {{--                                                <td colspan="4">--}}
                                                {{--                                                    <div class="d-flex justify-content-center">--}}
                                                {{--                                                        <a href="{{route('service.index')}}" type="button"--}}
                                                {{--                                                           class="btn btn-primary waves-effect waves-float waves-light">{{__('View all')}}</a>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </td>--}}
                                                {{--                                            </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="py-3 px-2">
                                            <b class="text-center">{{__('Sorry! No result found')}}</b>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="card card-company-table">
                            <a href="{{route('organization.index')}}">
                                <div class="card-body p-0">
                                    @if($products->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center"
                                                    >{{__('Trending Organization')}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th>Industry Type</th>
                                                    <th>Seller Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Registration Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($organizations as $organization)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="mr-1">
                                                                    <div>
                                                                        @if($organization->logo)
                                                                            <img width="30px"
                                                                                 src="{{asset(config('imagepath.companyLogo')).$organization->logo}}"
                                                                                 class="rounded img-fluid"
                                                                                 alt="Card image"
                                                                            />
                                                                        @else
                                                                            <img width="30px"
                                                                                 src="{{asset('images/default_logo.png')}}"
                                                                                 class="rounded img-fluid"
                                                                                 alt="Company Logo"
                                                                            />
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="font-weight-bolder">
                                                                        <a href="{{route('organization.show.home', encrypt($organization->id))}}">{{$organization->name}}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="font-weight-bolder"
                                                                >{{$organization->sectorType->type ?? 'Not Define'}}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="font-weight-bolder"
                                                                >{{$organization->email}} @if($organization->sellers()->first()->email_verified_at)
                                                                        <i class="fa fa-check-circle text-success"
                                                                           aria-hidden="true"
                                                                        ></i>@endif</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="font-weight-bolder"
                                                                >{{$organization->phone_number}}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="font-weight-bolder">
                                                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $organization->created_at)->format('d-M-Y h:i:s a')}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->
        </div>
    </div>
    <!-- END: Content-->
@endsection
@push('scripts')

@endpush

