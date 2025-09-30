<div>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea @foreach($inputAttributes as $key=>$value) {{ $key }}='{{ $value }}' @endforeach
    >{{ $slot }}</textarea>

    @error($name)
    <div class="invalid-feedback">{!! nl2br($message) !!}</div>
    @enderror

</div>
