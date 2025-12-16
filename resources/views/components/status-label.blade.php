<label class="badge text-bg-{{ $status->getCssClass() }} px-3 py-2 fs-6 w-100">
    <i class="{{ $status->getIcon() }}"></i>
    {{ $status->getTitle() }}
</label>
