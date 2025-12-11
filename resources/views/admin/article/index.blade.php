@extends('admin.article.layout')

@section('content')
    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin.title') }}</th>
            <th>{{ __('admin.status') }}</th>
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
                <td class="text-end">
                    <x-entity.table-buttons entity="articles" :item="$item" :multilang="\App\Enums\LangEnum::isMultilang()"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
