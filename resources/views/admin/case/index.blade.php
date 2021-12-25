@extends('layouts.admin')

@push('styles')
@endpush
@section('breadcrumb')
    <div class="col-12">
        <h2 class="content-header-title float-left mb-0">{{__('Case Management')}}</h2>
    </div>
@endsection
@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <table id="dataTable" class="datatables-basic table">
        </table>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            var Table = $('#dataTable').dataTable({
                stateSave: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: '{{ route('case.index', ['service'=>request()->service]) }}',
                columns: [
                    {data: "DT_RowIndex",title:"si", name: "DT_RowIndex", searchable: false, orderable: false},
                    {data: "case_id", title:"case id", searchable: true},
                    {data: "user.name",title:"User",},
                    {data: "service.name",title:"Service",},
                    {data: "details",title:"Details", },
                    {data: "date",title:"Submitted", },
                    {data: "action",title:"action", orderable: false, searchable: false},
                ],
            });
        })
    </script>

@endpush
