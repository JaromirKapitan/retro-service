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
                                <a class="text-success text-decoration-none" href="{{ route('admin.articles.edit', $mutation) }}" title="{{ __('admin.detail') }}">
                                    {!! getFlagByLang($lang) !!}
                                </a>
                            @else
                                <a class="text-decoration-none" href="{{ route('admin.articles.create', ['lang' => $lang, 'parent_id' => $item->id]) }}" title="{{ __('admin.add') }}">
                                    {!! getFlagByLang($lang) !!}
                                    <i class="fa fa-plus"></i>
                                </a>
                            @endif
                        @endforeach
                    </td>
                @endif

                <td class="text-end">
                    <x-entity.table-buttons entity="articles" :item="$item" />
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
