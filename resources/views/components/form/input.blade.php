<div>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="text" @foreach($inputAttributes as $key=>$value) {{ $key }}='{{ $value }}' @endforeach
    >

    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
