@extends('admin.admin.layout')

@section('content')
    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('name') }}</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>

                <td class="text-end">
                    <a href="{{ route('admin.admins.show', $item) }}" class="text-secondary text-hover-info"><i class="fa fa-info"></i></a>
                    <a href="{{ route('admin.admins.edit', $item) }}" class="text-secondary text-hover-warning"><i class="fa fa-pencil"></i></a>

                    <a class="text-secondary text-hover-danger submit-form" href="#" data-ask="{{ __('Do you really want to delete this record?') }}">
                        <i class="fa fa-trash-can"></i>
                    </a>
                    <form action="{{ route('admin.admins.destroy', $item->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
