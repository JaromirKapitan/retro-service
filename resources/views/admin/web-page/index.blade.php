@extends('admin.web-page.layout')

@section('content')
    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin.title') }}</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td class="text-end">
                    <span class="pe-5"></span>
                    <x-entity.table-buttons entity="web-pages" :item="$item" :multilang="\App\Enums\LangEnum::isMultilang()"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
