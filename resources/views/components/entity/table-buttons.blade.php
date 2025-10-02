<div>
    @if($multilang)
        @foreach($item->mutations as $lang=>$mutation)
            @if($mutation)
                <a class="flag" href="{{ route('admin.'.$entity.'.edit', $mutation) }}" title="{{ __('admin.edit') }}">
                    {!! getFlagByLang($lang) !!}
                </a>
            @else
                <a class="flag flag-default" href="{{ route('admin.'.$entity.'.create', ['lang' => $lang, 'parent_id' => $item->id]) }}" title="{{ __('admin.add') }}">
                    {!! getFlagByLang($lang) !!}
                </a>
            @endif
        @endforeach

        &nbsp;&nbsp;&nbsp;
    @endif

    <a href="{{ route('admin.'.$entity.'.show', $item) }}" class="text-secondary text-hover-info" title="{{ __('admin.detail') }}"><i class="fa fa-info"></i></a>
    <a href="{{ route('admin.'.$entity.'.edit', $item) }}" class="text-secondary text-hover-warning" title="{{ __('admin.edit') }}"><i class="fa fa-pencil"></i></a>

    <a class="text-secondary text-hover-danger submit-form" href="#" data-ask="{{ __('admin.do_you_really_want_to_delete_this_record') }}" title="{{ __('admin.delete') }}">
        <i class="fa fa-trash-can"></i>
    </a>
    <form action="{{ route('admin.'.$entity.'.destroy', $item->id) }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
</div>
