<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
    @if($multilang)
        @foreach($model->mutations as $lang=>$mutation)
            @if($mutation)
                <li class="nav-item">
                    <a @class(['nav-link', 'flag', 'active'=>request()->routeIs('admin.'.$entity.'.show')]) href="{{ route('admin.'.$entity.'.show', $mutation) }}"
                       title="{{ __('admin.detail') }}">
                        {!! getFlagByLang($lang) !!}
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a @class(['nav-link', 'flag flag-default']) href="{{ route('admin.'.$entity.'.create', ['lang' => $lang, 'parent_id' => $model->id]) }}"
                       title="{{ __('admin.add') }}">
                        {!! getFlagByLang($lang) !!}
                    </a>
                </li>
            @endif
        @endforeach

        &nbsp;&nbsp;&nbsp;
    @endif

    @if(Route::has('admin.'.$entity.'.show'))
        <li class="nav-item">
            <a @class(['nav-link', 'active'=>request()->routeIs('admin.'.$entity.'.show')]) href="{{ route('admin.'.$entity.'.show', $model) }}"
               title="{{ __('admin.detail') }}">
                <i class="fa fa-photo-film"></i>
                <span class="d-md-none">{{ __('admin.files') }}</span>
            </a>
        </li>
    @endif
    @if(Route::has('admin.'.$entity.'.edit'))
        <li class="nav-item">
            <a @class(['nav-link', 'active'=>request()->routeIs('admin.'.$entity.'.edit')]) href="{{ route('admin.'.$entity.'.edit', $model) }}"
               title="{{ __('admin.edit') }}">
                <i class="fa fa-pencil"></i>
                <span class="d-md-none">{{ __('admin.edit') }}</span>
            </a>
        </li>
    @endif
    @if(Route::has('admin.'.$entity.'.destroy'))
        <li class="nav-item">
            <a class="nav-link submit-form text-hover-danger" href="#" data-ask="{{ __('admin.do_you_really_want_to_delete_this_record') }}"
               title="{{ __('admin.delete') }}">
                <i class="fa fa-trash-can"></i>
                <span class="d-md-none">{{ __('admin.delete') }}</span>
            </a>
            <form action="{{ route('admin.'.$entity.'.destroy', $model) }}" method="POST" class="d-none">
                @csrf
                @method('DELETE')
            </form>
        </li>
    @endif
</ul>
