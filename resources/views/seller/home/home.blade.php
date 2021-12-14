@extends('layouts.seller')
@section('page-title','Dashboard')
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{__('Dashboard')}}</h2>
@endsection
@section('content')
    <section id="basic-datatable">
        <div class="row">
            @if(auth('seller')->user()->organization->sector === 'product')
            <div class="col-xl-12 col-md-12 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title"> Statistics</h4>
                        <div class="d-flex align-items-center">
                            {{-- <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p> --}}
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a href="{{route('seller.product.index')}}">
                                <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="box" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{\App\Models\Seller\Product::where('organization_id',auth('seller')->user()->organization_id)->count()}}</h4>
                                        <p class="card-text font-small-3 mb-0">Total Product</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a href="{{route('seller.product.feature.list')}}">
                                <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="box" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{\App\Models\Seller\Feature::where('organization_id',auth('seller')->user()->organization_id)->count()}}</h4>
                                        <p class="card-text font-small-3 mb-0">Feature Product</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a href="{{route('seller.product.sponsor.list')}}">
                                <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="box" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{\App\Models\Inquiry::where('organization_id',auth('seller')->user()->organization_id)->count()}}</h4>
                                        <p class="card-text font-small-3 mb-0">Total Inquery</p>
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
                                        <h4 class="font-weight-bolder mb-0">{{ number_format(\App\Models\Wallet::where(['walletable_type'=>\App\Models\Admin\Organizations::class,'walletable_id'=>auth('seller')->user()->organization_id])->first()->balance??0, 2,) }} BDT
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
                            {{--                                <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p>--}}
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a  href="{{route('seller.order.product.list', ['status'=>'all'])}}">
                                <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i class="fab fa-first-order" style="font-size: large"></i>
                                            </div>
                                        </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0"> {{\App\Models\Invoice::where('organization_id',auth('seller')->user()->organization_id)->count()}}</h4>
                                        <p class="card-text font-small-3 mb-0">Total Order</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a  href="{{route('seller.order.product.list', ['status'=>'pending'])}}">
                                <div class="media">
                                        <div class="avatar bg-yahoo-info mr-2">
                                            <div class="avatar-content">
                                                <i class="fab fa-first-order" style="font-size: large"></i>
                                            </div>
                                        </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{\App\Models\Invoice::where(['organization_id'=> auth('seller')->user()->organization_id,'status'=>'pending'])->count()}}</h4>
                                        <p class="card-text font-small-3 mb-0">Pending Order</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a  href="{{route('seller.order.product.list', ['status'=>'confirmed'])}}">
                                <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i class="fab fa-first-order" style="font-size: large"></i>
                                            </div>
                                        </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{\App\Models\Invoice::where(['organization_id'=> auth('seller')->user()->organization_id,'status'=>'confirmed'])->count()}}</h4>
                                        <p class="card-text font-small-3 mb-0">Confirm Order</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <a  href="{{route('seller.order.product.list', ['status'=>'cancelled'])}}">
                                <div class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content">
                                                <i class="fab fa-first-order" style="font-size: large"></i>
                                            </div>
                                        </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{\App\Models\Invoice::where(['organization_id'=> auth('seller')->user()->organization_id,'status'=>'cancelled'])->count()}}</h4>
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
                                        <h4 class="font-weight-bolder mb-0">{{number_format(\App\Models\Invoice::where(['organization_id'=> auth('seller')->user()->organization_id,'status' => 'confirmed'])->sum('payable_amount'),2)}} BDT</h4>
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
                                        <h4 class="font-weight-bolder mb-0">{{number_format(\App\Models\Invoice::where(['organization_id'=> auth('seller')->user()->organization_id,'status' => 'confirmed'])->whereMonth('created_at','=' , Carbon\Carbon::now()->month)->sum('payable_amount'),2)}} BDT</h4>
                                        <p class="card-text font-small-3 mb-0">Order Balance in this Month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title"> Statistics</h4>
                            <div class="d-flex align-items-center">
                                {{-- <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p> --}}
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{route('seller.service.index')}}">
                                    <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>

                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{\App\Models\Seller\Service::where('organization_id',auth('seller')->user()->organization_id)->count()}}</h4>
                                            <p class="card-text font-small-3 mb-0">Total Service</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{route('seller.product.feature.list')}}">
                                    <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{\App\Models\Seller\Feature::where('organization_id',auth('seller')->user()->organization_id)->count()}}</h4>
                                            <p class="card-text font-small-3 mb-0">Feature service</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{route('seller.service.sponsor.list')}}">
                                    <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{\App\Models\Inquiry::where('organization_id',auth('seller')->user()->organization_id)->count()}}</h4>
                                            <p class="card-text font-small-3 mb-0">Total Inquiry</p>
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
                                            <h4 class="font-weight-bolder mb-0">{{ number_format(\App\Models\Wallet::where(['walletable_type'=>\App\Models\Admin\Organizations::class,'walletable_id'=>auth('seller')->user()->organization_id])->first()->balance??0, 2,) }} BDT
                                            </h4>
                                            <p class="card-text font-small-3 mb-0">Wallet Balance</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(\auth('seller')->user()->organization->status == 'active')
                @if(\auth('seller')->user()->organization->sector == 'product')
                    <div class="col-12">
                        <div class="card px-2">
                            <div class="card-header border-bottom p-1">
                                <div class="head-label">
                                    <h4 class="mb-0"><i class="fa fa-list"></i>
                                        {{__('Product List')}}
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body pt-2 pb-0">
                                <div class="row ">
                                    <div class="col-12">
                                        @include('seller.count.count')
                                    </div>
                                </div>
                            </div>
                            <!-- Tab panes -->
                            <div class="card-body table-responsive">
                                <table id="dataTable" class="datatables-basic table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Product Name')}}</th>
                                        <th>{{__('Category')}}</th>
                                        <th>{{__('Views')}}</th>
                                        <th>{{__('Click')}}</th>
                                        <th>{{__('Inquiries')}}</th>
                                        <th>{{__('Comments')}}</th>
                                        <th>{{__('Date')}}</th>
                                        <th>{{__('Feature')}}</th>
                                        <th>{{__('Sponsor')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="card px-2">
                            <div class="card-header border-bottom p-1">
                                <div class="head-label">
                                    <h4 class="mb-0"><i class="fa fa-list"></i>
                                        {{__('Services List')}}
                                    </h4>
                                </div>
                            </div>

                            <div class="card-body pt-2 pb-0">
                                <div class="row ">
                                    <div class="col-12">
                                        @include('seller.count.count')
                                    </div>
                                </div>
                            </div>
                            <!-- Tab panes -->
                            <div class="card-body table-responsive">
                                <table id="dataTable" class="datatables-basic table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Service Name')}}</th>
                                        <th>{{__('Category')}}</th>
                                        <th>{{__('Views')}}</th>
                                        <th>{{__('Click')}}</th>
                                        <th>{{__('Inquiries')}}</th>
                                        <th>{{__('Comments')}}</th>
                                        <th>{{__('Date')}}</th>
                                        <th>{{__('Feature')}}</th>
                                        <th>{{__('Sponsored')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                @endif
            @elseif(\auth('seller')->user()->organization->status == 'expired')
                <div class="col-12">
                    <div class="card px-2 py-5">
                        <h3 class="text-danger text-center">
                            Your organization date is expired.. Please renew your organization account..
                        </h3>
                    </div>
                </div>
                @elseif(\auth('seller')->user()->organization->status == 'blocked')
                <div class="col-12">
                    <div class="card px-2 py-5">
                        <h3 class="text-danger text-center">
                            Your organization blocked.
                        </h3>
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="card px-2 py-5">
                        <h3 class="text-danger text-center">
                            Sorry ! your account is not activate yet
                        </h3>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#dataTable').dataTable({
                // stateSave: true,
                serverSide: true,
                processing: true,
                ajax: '{{ route('seller.home', ['status'=>request('status')]) }}',
                columns: [
                    {data: "DT_RowIndex", name: "DT_RowIndex",title: 'Si', searchable: false, orderable: false},
                    {data: "nameWithImage", title: 'Item Name'},
                    // {data: "name",visible:false},
                    {data: "category.name",title: 'category', defaultContent: '<span style="color: red">Uncategorized</span'},
                    {data: "report.view",title: 'view',searchable: false, defaultContent: 0},
                    {data: "report.click",title: 'click',searchable: false, defaultContent: 0},
                    {data: "report.inquiry",title: 'inquries',searchable: false, defaultContent: 0},
                    {data: "comments_count",title: 'comments',searchable: false, defaultContent: 0},
                    {data: "date",title: 'date',searchable: false},
                    {data: "feature",title: 'feature',searchable: false, orderable: false},
                    {data: "sponsor",title: 'sponsor',searchable: false, orderable: false},
                    {data: "status",title: 'status',searchable: false},
                    {data: "action",title: 'action', searchable: false, orderable: false},
                ],
            });
        })
    </script>
@endpush
