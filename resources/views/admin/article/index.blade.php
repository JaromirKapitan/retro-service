@extends('admin.article.layout')

@section('content')
    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin.title') }}</th>
            <th>{{ __('admin.status') }}</th>
            @if(\App\Enums\Lang::isMultilang())
                <th>{{ __('admin.lang') }}</th>
            @endif
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <span class=" w-75 badge rounded-pill content-status-{{ $item->status }}">
                        {{ __('admin.'.$item->status) }}
                    </span>
                </td>

                @if(\App\Enums\Lang::isMultilang())
                    <td>
                        @foreach($item->mutations as $lang=>$mutation)
                            @if($mutation)
                                <a class="text-success" href="{{ route('admin.articles.edit', $mutation) }}">
                                    {{ $lang }}
                                </a>
                            @else
                                <a class="" href="{{ route('admin.articles.create', ['lang' => $lang, 'parent_id' => $item->id]) }}">
                                    {{ $lang }}
                                </a>
                            @endif
                        @endforeach
                    </td>
                @endif

                <td class="text-end">
                    <a href="{{ route('admin.articles.show', $item) }}" class="text-secondary text-hover-info"><i class="fa fa-info"></i></a>
                    <a href="{{ route('admin.articles.edit', $item) }}" class="text-secondary text-hover-warning"><i class="fa fa-pencil"></i></a>

                    <a class="text-secondary text-hover-danger submit-form" href="#" data-ask="{{ __('admin.do_you_really_want_to_delete_this_record') }}">
                        <i class="fa fa-trash-can"></i>
                    </a>
                    <form action="{{ route('admin.articles.destroy', $item->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
