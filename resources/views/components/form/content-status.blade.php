<div class="btn-group" role="group">
    @foreach(\App\Enums\ContentStatus::values() as $status)
        <input type="radio" class="btn-check" name="status" id="status-{{ $status }}" autocomplete="off"
               {{ $value == $status ? "checked='checked'" : "" }} value="{{ $status }}"
        >
        <label class="btn btn-outline-{{ \App\Enums\ContentStatus::cssClass($status) }}"
               for="status-{{ $status }}">{{ __($status) }}</label>
    @endforeach
</div>
