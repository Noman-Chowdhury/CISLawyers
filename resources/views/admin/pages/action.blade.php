<div class="dropdown">
    <button type="button"
            class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light"
            data-toggle="dropdown">
        <div style="font-size:20px;"><i class="fas fa-ellipsis-v fa-xs"></i></div>
    </button>
    <div class="dropdown-menu">
        @if(!isset($case))
            <a class="dropdown-item "
               href="#">
                <div><i class="fas fa-eye"></i>&nbsp;&nbsp; {{__('View')}}</div>
            </a>
            <a class="dropdown-item "
               href="#">
                <div><i class="fas fa-pen"></i>&nbsp;&nbsp; {{__('Edit')}}</div>
            </a>

            <form action="#" method="post">
                @csrf
                @method('DELETE')
                <button class="confirm-text dropdown-item" type="submit"
                        style="width: 100%; border: none; outline:none;">
                    <div><i class="far fa-trash-alt"></i>&nbsp;&nbsp; {{__('Delete')}}</div>
                </button>
            </form>
        @endif
        @if(isset($case))
            <a class="dropdown-item "
               href="#">
                <div><i class="fas fa-eye"></i>&nbsp;&nbsp; {{__('View')}}</div>
            </a>
            <a class="dropdown-item "
               href="#">
                <div><i class="fas fa-eye"></i>&nbsp;&nbsp; {{__('Assign to Member')}}</div>
            </a>
        @endif
    </div>
</div>
