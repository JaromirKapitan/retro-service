<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
    <li class="nav-item">
        <a @class(['nav-link', 'active'=>request()->routeIs('admin.'.$entity.'.show')]) href="{{ route('admin.'.$entity.'.show', $model) }}">
            <i class="fa fa-photo-film"></i>
        </a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'active'=>request()->routeIs('admin.'.$entity.'.edit')]) href="{{ route('admin.'.$entity.'.edit', $model) }}">
            <i class="fa fa-pencil"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link submit-form text-hover-danger" href="#" data-ask="{{ __('admin.do_you_really_want_to_delete_this_record') }}">
            <i class="fa fa-trash-can"></i>
        </a>
        <form action="{{ route('admin.'.$entity.'.destroy', $model) }}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>
    </li>
</ul>
