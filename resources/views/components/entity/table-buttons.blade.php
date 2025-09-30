<div>
    <a href="{{ route('admin.'.$entity.'.show', $item) }}" class="text-secondary text-hover-info"><i class="fa fa-info"></i></a>
    <a href="{{ route('admin.'.$entity.'.edit', $item) }}" class="text-secondary text-hover-warning"><i class="fa fa-pencil"></i></a>

    <a class="text-secondary text-hover-danger submit-form" href="#" data-ask="{{ __('admin.do_you_really_want_to_delete_this_record') }}">
        <i class="fa fa-trash-can"></i>
    </a>
    <form action="{{ route('admin.'.$entity.'.destroy', $item->id) }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
</div>
