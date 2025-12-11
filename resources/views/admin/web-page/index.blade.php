@extends('admin.web-page.layout')

@section('content')
    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin.title') }}</th>
            <th>{{ __('admin.status') }}</th>
            <th></th>
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
                <td>
                </td>
                <td class="text-end">
                    @if($item->home)
                        <i class="fa fa-home text-secondary"></i>
                    @endif
                    @if($item->for_vehicles)
                        <i class="fa fa-car text-secondary"></i>
                    @endif
                    <span class="pe-5"></span>
                    <x-entity.table-buttons entity="web-pages" :item="$item" :multilang="\App\Enums\LangEnum::isMultilang()"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
