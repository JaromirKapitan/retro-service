<li x-sortable-item class="highlight" data-id="{{ $webMenuItem->id }}">
    {{ $webMenuItem->target->title }}
    <div class="float-end">
        <i class="fa fa-arrows-alt handle cursor-move"></i>
        <i class="fa fa-plus menu-item-plus" data-parent-id="{{ $webMenuItem->id }}"></i>
        <i class="fa fa-trash-can" wire:click="remove({{ $webMenuItem->id }})"></i>
    </div>
    <ul x-sortable>
        @foreach($webMenuItem->childrens as $child)
            @include('livewire.admin.web-menu-editor-item', ['webMenuItem' => $child])
        @endforeach
    </ul>
</li>
