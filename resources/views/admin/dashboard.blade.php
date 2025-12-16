@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row">

        @foreach ($statuses as $status)
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header text-white bg-{{ $status->getCssClass() }} ">
                        <div class="d-flex justify-content-between">
                            <span>
                                <i class="{{ $status->getIcon() }}"></i> {{ $status->getTitle() }}
                            </span>
                            <span>
                                <a href="{{ route('admin.tasks.create', ['status' => $status->value]) }}" class="text-white text-hover-dark" title="Pridať úlohu">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="card-body sortable" data-callback="reorderTask" data-status="{{ $status->value }}">
                        @foreach($tasksByStatus->get($status->value) as $task)
                            <div class="card mb-2" data-id="{{ $task->id }}">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <span>
                                            <a href="{{ route('admin.tasks.show', $task) }}" class="text-secondary text-hover-warning" title="{{ __('admin.detail') }}">
                                                {{ $task->title }}
                                            </a>
                                        </span>
                                        <span>
                                            <i class="fa fa-arrows handle cursor-pointer"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span>{{ $task->updated_at->format('d.m.Y H:i') }}</span>
                                        <span>{{ optional($task->admin)->name }}</span>
                                    </div>
                                </div>

                                <div class="card-footer p-0">
                                    {{-- full size button to assign to me --}}
                                    @if (is_null($task->admin))
                                        <form action="{{ route('admin.tasks.assign', $task) }}" method="POST" class="d-inline w-100">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary w-100 rounded-top-0" title="{{ __('admin.assign_to_me') }}">
                                                <i class="fa fa-user-plus"></i> {{ __('admin.assign_to_me') }}
                                            </button>
                                        </form>
                                    @endif
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

@push('scripts')
<script>
    window.reorderTask = function(evt){
        $.post( "{{ route('admin.tasks.reorder') }}", {
            _token: "{{ csrf_token() }}",
            id: evt.item.dataset.id,
            status: evt.to.dataset.status,
        }, function( response ) {
            window.notify.notify(response.message, response.success ? 'success' : 'error');
        });
    }
</script>
@endpush
