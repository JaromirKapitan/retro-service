<div>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea @foreach($inputAttributes as $key=>$value) {{ $key }}='{{ $value }}' @endforeach
    >{{ $slot }}</textarea>

    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

</div>
