<div class="dropdown">
        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light"
                data-toggle="dropdown">
            <div style="font-size:20px;">
                <i class="fas fa-ellipsis-v fa-xs"></i>
            </div>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#partner">
                <div><i class="fas fa-eye"></i>&nbsp;&nbsp; {{__('Show Details')}}</div>
            </a>
{{--            <a class="dropdown-item" href="#" target="_blank">--}}
{{--                <div><i class="fas fa-print"></i>&nbsp;&nbsp; {{__('Print')}}</div>--}}
{{--            </a>--}}
        </div>
    </div>

<script>
    if ($('.del_confirm-text').length) {
        $('.del_confirm-text').on('click', function (event) {
            var form = $(this).closest("form");
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
    }
</script>
