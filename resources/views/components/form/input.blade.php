<div>
    <label for="{{ $inputAttributes['id'] }}" class="form-label">{{ $label }}</label>
    <input @foreach($inputAttributes as $key=>$value) {{ $key }}='{{ $value }}' @endforeach
    >

    @error($name)
    <div class="invalid-feedback">{!! nl2br($message) !!}</div>
    @enderror
</div>
