<div>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="password" @foreach($inputAttributes as $key=>$value) {{ $key }}='{{ $value }}' @endforeach
    >

    @error($name)
    <div class="invalid-feedback">{!! nl2br($message) !!}</div>
    @enderror
</div>
