<div class="btn-group" role="group">
    @foreach($enumClass::cases() as $status)
        <input type="radio" class="btn-check" name="status" id="status-{{ $status->value }}" autocomplete="off"
               {{ $value == $status->value ? "checked='checked'" : "" }} value="{{ $status->value }}"
        >
        <label class="btn btn-outline-{{ $status->getCssClass() }}" for="status-{{ $status->value }}">
            <i class="{{ $status->getIcon() }}"></i>
            {{ $status->getTitle() }}
        </label>
    @endforeach
</div>
