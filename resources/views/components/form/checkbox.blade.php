<div>
    <input type="checkbox" @foreach($inputAttributes as $key=>$value) {{ $key }}='{{ $value }}' @endforeach >
    <label for="{{ $inputAttributes['id'] }}" class="form-label">{{ $label }}</label>

    @error($name)
    <div class="invalid-feedback">{!! nl2br($message) !!}</div>
    @enderror
</div>
