@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row">

        @foreach ($statuses as $status)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header text-white bg-{{ $status->getCssClass() }} ">
                        <div class="d-flex justify-content-between">
                            <span>
                                <i class="{{ $status->getIcon() }}"></i> {{ $status->getTitle() }}
                            </span>
                            <span>
                                {{-- add button --}}
                                <a href="{{ route('admin.tasks.create', ['status' => $status->value]) }}" class="text-white text-hover-warning" title="Pridať úlohu">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach($tasksByStatus->get($status->value) as $task)
                            <div class="card mb-2">
                                <div class="card-header">
                                    {{ $task->title }}
                                </div>

                                <div class="card-body">
                                    <p>{{ $task->description }}</p>
                                </div>

                                <div class="card-footer text-muted">
                                    {{-- date updated_at on left and admin name on right --}}
                                    <div class="d-flex justify-content-between">
                                        <span>{{ $task->updated_at->format('d.m.Y H:i') }}</span>
                                        <span>
                                            <a href="{{ route('admin.tasks.edit', $task) }}" class="text-secondary text-hover-warning" title="Upraviť">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                        <span>
                                            @if (is_null($task->admin))
                                                <form action="{{ route('admin.tasks.assign', $task) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">{{ __('admin.assign_to_me') }}</button>
                                                </form>
                                            @else
                                                {{ optional($task->admin)->name }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
