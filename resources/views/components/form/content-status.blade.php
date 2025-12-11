<div class="btn-group" role="group">
    @foreach(\App\Enums\ContentStatusEnum::values() as $status)
        <input type="radio" class="btn-check" name="status" id="status-{{ $status }}" autocomplete="off"
               {{ $value == $status ? "checked='checked'" : "" }} value="{{ $status }}"
        >
        <label class="btn btn-outline-{{ \App\Enums\ContentStatusEnum::cssClass($status) }}"
               for="status-{{ $status }}">{{ __('admin.'.$status) }}</label>
    @endforeach
</div>
