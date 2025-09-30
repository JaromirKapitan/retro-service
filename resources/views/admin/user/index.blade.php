@extends('admin.user.layout')

@section('content')
    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin.name') }}</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>

                <td class="text-end">
                    <x-entity.table-buttons entity="users" :item="$item" />
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
