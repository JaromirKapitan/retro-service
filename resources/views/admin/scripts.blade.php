
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/46.0.2/ckeditor5.css" />
<script src="https://cdn.ckeditor.com/ckeditor5/46.0.2/ckeditor5.umd.js"></script>

<script>
    window.notifications = [];

    @foreach(['info', 'success', 'warning', 'error'] as $type)
    @if(session()->has($type))
    window.notifications.push({
        message: "{{ session($type) }}",
        type: '{{ $type }}'
    })
    @endif
    @endforeach
</script>

@stack('scripts')

@livewireScriptConfig
