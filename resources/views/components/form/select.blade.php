<div>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    <select @foreach($inputAttributes as $key=>$value) {{ $key }}='{{ $value }}' @endforeach>
        @if($emptyLabel)
            <option>{{ $emptyLabel }}</option>
        @endif

        @foreach($options as $option)
            <option value="{{ $option->value }}" {{ $option->selected }}>{{ $option->title }}</option>
        @endforeach
    </select>

    @error($name)
    <div class="invalid-feedback">{!! nl2br($message) !!}</div>
    @enderror
</div>
