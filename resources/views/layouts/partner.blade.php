<!DOCTYPE html>
<html class="loading" id="mainHtml" lang="en" data-textdirection="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="A platform that will impact and ease your life.">
    <meta name="keywords" content="Source your business in sources.com.bd">
    <meta name="author" content="Sources">
    <title>@yield('page-title','CIS Lawyers') | {{config('app.name')}}</title>
{{--    <title>Sources | Best B2B Wholesale Market in Bangladesh</title>--}}
    <link rel="apple-touch-icon" href="{{ asset('admin/app-assets/images/ico/webtech.png') }}'">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/app-assets/images/ico/webtech.png') }}">
{{--    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/toastr.min.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/admin.css')) }}">

    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/fonts/flag-icon-css/css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free-5.15.1-web/css/all.css') }}"/>

    @stack('styles')
    <script>
        document.getElementById('mainHtml').classList.add(localStorage.getItem('light-layout-current-skin'))
    </script>
</head>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

@include('partner.inc.header')
@include('partner.inc.sidebar')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        @yield('breadcrumb')
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('partner.inc.footer')

{{--    <script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>--}}
<script src="{{ asset(mix('js/admin.js')) }}"></script>
<script src="{{ asset('admin/app-assets/js/scripts/pages/app-email.js') }}"></script>
<script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
{!! Toastr::message() !!}

@stack('scripts')
<script>
    //global function
    function tinyEditor(elementId,lengthShowId,maximumLength,placeholder, linkAvailable=false){
        console.log(linkAvailable)
        let max_chars = maximumLength; //max characters
        let max_for_html = max_chars+100; //max characters for html tags
        let allowed_keys = [8, 13, 16, 17, 18, 20, 33, 34, 35, 36, 37, 38, 39, 40, 46];
        let chars_without_html = 0;
		let plugin=[]
		let tool=""
	    let valid_elements =''
	    if (linkAvailable){
            plugin = [
                'advlist autolink lists image print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount imagetools', 'link'
            ]
		    tool = 'undo redo | formatselect | fontsizeselect | ' +
                'bold italic underline backcolor forecolor| alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'table|image|link'
		    valid_elements='a[class|style|href]'
	    }else{
            plugin = [
                'advlist autolink lists image print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount imagetools'
            ]
		    tool = 'undo redo | formatselect | fontsizeselect | ' +
                'bold italic underline backcolor forecolor| alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'table|image'
            valid_elements='a[class|style]'
	    }
        function alarmChars() {
            if (chars_without_html > (max_chars - 25)) {
                $(lengthShowId).css('color', 'red');
            } else {
                $(lengthShowId).css('color', 'gray');
            }
        }

        var object = tinymce.init({
            selector: elementId,
            height: 500,
            menubar: false,
            plugins: plugin,
            toolbar: tool,
            paste_as_text: false,
            // content_css: '//www.tiny.cloud/css/codepen.min.css',
            placeholder: placeholder,
            extended_valid_elements : valid_elements,
            automatic_uploads: true,
	        relative_url: false,
            images_upload_handler:function (blobInfo, success, failure, progress){
                let xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '/image-upload');
                xhr.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");

                xhr.upload.onprogress = function (e) {
                    progress(e.loaded / e.total * 100);
                };

                xhr.onload = function() {
                    let json;
                    if (xhr.status === 403) {
                        failure('HTTP Error: ' + xhr.status, { remove: true });
                        return;
                    }
                    if (xhr.status < 200 || xhr.status >= 300) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);
                    console.log(json)
                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                xhr.onerror = function () {
                    failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);

            },
            // urlconverter_callback: function(url, node, on_save, name) {
            //     // Do some custom URL conversion
            //     url = '';
            //     // Return new URL
            //     return url;
            // },

            setup: function (ed) {
                ed.on("KeyDown FocusOut", function (ed, evt) {
                    tinyMCE.triggerSave()
                    // tinyMCE.activeEditor.save()
                    // $(tinyMCE.activeEditor.getElement()).trigger('change')
                    chars_without_html = $.trim(tinyMCE.activeEditor.getContent().replace(/(<([^>]+)>)/ig, "")).length;
                    let chars_with_html = tinyMCE.activeEditor.getContent().length;
                    let key = ed.keyCode;

                    $(lengthShowId).html(max_chars - chars_without_html);

                    if (allowed_keys.indexOf(key) !== -1) {
                        alarmChars();
                        return;
                    }

                    if (chars_without_html > max_chars) {
                        ed.stopPropagation();
                        ed.preventDefault();
                    } else if (chars_without_html > max_chars - 1 && key !== 8 && key !== 46) {
                        alert('Characters limit!');
                        ed.stopPropagation();
                        ed.preventDefault();
                    }
                    alarmChars();
                });
            },
        });
        if(linkAvailable){
            console.log((object))
            object.relative_urls= false
	        // object.plugins.prototype.push('link')
        }

        chars_without_html = $.trim($(elementId).text().replace(/(<([^>]+)>)/ig, "")).length;
        $(lengthShowId).html(max_chars - chars_without_html);
        alarmChars();
    }
    function askBeforeLeave(){
        window.onbeforeunload = function (e) {
            e = e || window.event;

            // For IE and Firefox prior to version 4
            if (e) {
                e.returnValue = 'Sure?';
            }

            // For Safari
            return 'Sure?';
        };
    };
    //type and search by select2 plugin
    $('.select2').select2();
    $(window).on('load',  function(){
        if (feather) {
            feather.replace({ width: 14, height: 14 });
        }
    })
    //dataTable initialize
    $(document).ready( function (){
        $(document).on('click', '.confirm-text', function(event){
            var form =  $(this).closest("form");
            // var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                }
            });
        });

        //Restore Alert
        $(document).on('click', '.confirm-restore', function (event) {
            var form = $(this).closest("form");
            // var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This will Restore into Database Again!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Restore it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                }
            });
        });

        //delete forever button
        $(document).on('click', '.confirm-deleteForever', function (event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This Data will Permanently Deleted, and Can't Restore it Again!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete it Forever!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                }
            });
        });

        $('#dataTable').DataTable();
    })
    //all error message show in tostr
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error('{{$error}}', 'Error', {
        closeButton: true,
        progressBar: true,
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut',
        timeOut: 5000,
    });
    @endforeach
    @endif

</script>
</body>
<!-- END: Body-->
</html>
