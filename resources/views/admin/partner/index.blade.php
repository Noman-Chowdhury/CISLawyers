@extends('layouts.admin')
@section('page-title','Partner List')
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0"> {{__('Partner')}}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active">{{__('Partner list')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom p-1">
                        <div class="head-label">
                            <h4 class="mb-0 float-left mr-3 "><i class="fa fa-list"></i> {{__('Partner List')}} &nbsp;&nbsp;</h4>
                        </div>
                        <div class="dt-action-buttons text-right">
                            <div class="dt-buttons d-inline-flex">
                                <button class="btn add-new btn-outline-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                        data-toggle="modal" data-target="#inlineForm"
                                ><span>Add partner</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="dataTable" class="datatables-basic table text-center">
                            {{--Data show from DataTable --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33"
         style="display: none;" aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Add partner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="#" id="partnerFrom">
                    <div class="modal-body flex-grow-1">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="user-role">Partner type</label>
                                    <select id="user-role" class="form-control" name="type">
                                        <option value="lawyer">Lawyer</option>
                                        <option value="consultant">Consultant</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                    <input type="text" class="form-control dt-full-name"
                                           id="basic-icon-default-fullname" placeholder="Type valid name"
                                           name="full_name"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-uname">Father's name</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                           placeholder="Type father name" name="father_name"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-uname">Mother's name</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                           placeholder="Type mother name" name="mother_name"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-uname">Date of birth</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                           placeholder="Date of Birth" name="date_of_birth"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-uname">National Id</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                           placeholder="Type valid NID number" name="nid_num"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-uname">Passport number</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                           placeholder="Type valid passport number" name="passport_num"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-uname">Bank name</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                           placeholder="Type bank name" name="bank_name"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-uname">Bank A/C number</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                           placeholder="Type bank A/C number" name="bank_acc_number"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-email">Email</label>
                                    <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                           aria-describedby="basic-icon-default-email2" name="user_email"
                                    >
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="customFile">Personal photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="customFile">Passport</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="customFile">NID/Birth certificate</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="customFile">Educational certificate</label><small>last gained academic
                                        certificate</small>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="customFile">CV</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="btn btn-primary mr-1 data-submit waves-effect waves-float waves-light"
                        >Submit
                        </button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal" id="cancelModal">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready( function (){
            $('#dataTable').dataTable({
                serverSide:true,
                processing:true,
                responsive: true,
                ajax: '{{ route('admin.partner.list') }}',
                columns:[
                    {data:"DT_RowIndex", title:"si",name:"DT_RowIndex", searchable:false, orderable:false},
                    {data: "name", title:"Name", orderable:false, defaultContent: 'null'},
                    // {data: "item.name", title:"Item Name", orderable:false, defaultContent: 'null'},
                    {data:"email", title:"Email", orderable:false},
                    {data:"partner_type", title:"Partner type", orderable:false},
                    {data:"nid_number", title:"NID number", orderable:false},
                    {data:"passport_number", title:"Passport number", orderable:false},
                    {data:"action", title:"action",  orderable:false, searchable:false}
                ],
            });
        })
        $('#partnerFrom').on('submit', function (e) {
            e.preventDefault()
            var $form = $(this);
            var serializedData = $form.serialize();
            $.ajax({
                method: 'POST',
                url: "{{ route('admin.partner.add') }}",
                data: serializedData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response)
                    if (response.success) {
                        $('#cancelModal').click()
                        $form.trigger( "reset" );
                        toastr.success(response.message)
                    } else {
                        toastr.error(response.message)
                    }
                },
                error: function (error) {
                    console.log('error')
                    const obj = error.responseJSON.errors;
                    for (key in obj) {
                        toastr.error(obj[key])
                    }
                }
            });
        })
    </script>
@endpush
