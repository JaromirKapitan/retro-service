<div>
    <form wire:submit="store" class="mb-3">
        <div
            x-data="{ uploading: false, progress: 0 }"
            x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false"
            x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
        >

            <input class="form-control" type="file" multiple wire:model="files"/>
            @error('files')
            <span class="alert alert-error">{{ $message }}</span>
            @enderror

            <!-- Progress Bar -->
            <div x-show="uploading">
                <progress max="100" x-bind:value="progress"></progress>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Size</th>
            <th>Type</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($model->getMedia($type) as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>{{ $file->human_readable_size }}</td>
                <td>{{ $file->mime_type }}</td>
                <td class="text-end">
                    <button type="button" class="btn btn-sm btn-outline-danger" wire:click="delete({{$file->id}})">
                        <i class="fa fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
