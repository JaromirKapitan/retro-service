@extends('admin.task.layout')

@section('content')
    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin.title') }}</th>
            <th>{{ __('admin.admin') }}</th>
            <th>{{ __('admin.status') }}</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ optional($item->admin)->name }}</td>
                <td>
{{--                    <span class=" w-75 badge rounded-pill content-status-{{ $item->status }}">--}}
{{--                        {{ __('admin.'.$item->status) }}--}}
{{--                    </span>--}}
                    <x-status-label :status="$item->statusEnum"/>
                </td>
                <td class="text-end">
                    @if($item->vehicle)
                        <a href="{{ route('admin.vehicles.show', $item->vehicle) }}" class="text-secondary text-hover-success" title="{{ __('admin.vehicle') }}">
                            <i class="fa fa-car"></i>
                        </a>
                    @endif

                    <x-entity.table-buttons entity="tasks" :item="$item"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
