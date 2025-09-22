@extends('admin.web-page.layout')

@section('content')
    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('title') }}</th>
            <th>{{ __('status') }}</th>
            @if(\App\Enums\Lang::isMultilang())
                <th>{{ __('lang') }}</th>
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
                        {{ __($item->status) }}
                    </span>
                </td>
                @if(\App\Enums\Lang::isMultilang())
                <td>
                    @foreach($item->mutations as $lang=>$mutation)
                        @if($mutation)
                            <a class="text-success" href="{{ route('admin.web-pages.edit', $mutation) }}">
                                {{ $lang }}
                            </a>
                        @else
                            <a class="" href="{{ route('admin.web-pages.create', ['lang' => $lang, 'parent_id' => $item->id]) }}">
                                {{ $lang }}
                            </a>
                        @endif
                    @endforeach
                </td>
                @endif
                <td class="text-end">
                    <a href="{{ route('admin.web-pages.edit', $item) }}" class="text-warning"><i class="fa fa-pencil"></i></a>

                    <a class="text-danger submit-form" href="#" data-ask="{{ __('Do you really want to delete this record?') }}">
                        <i class="fa fa-trash-can"></i>
                    </a>
                    <form action="{{ route('admin.web-pages.destroy', $item->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
