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

    <div class="row g-3">
        @foreach($model->getMedia($type) as $file)
            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="card h-100">
                    <img src="{{ $file->getUrl() }}" class="img-thumbnail" alt="..."/>
                    <div class="card-body d-flex align-items-end">
                        <div class="btn-group btn-group-sm w-100" role="group" aria-label="Small button group">
                            <button type="button" class="btn btn-outline-decondary disabled">
                                <i class="fa fa-arrows-up-down-left-right"></i>
                            </button>
                            <button type="button" class="btn btn-outline-decondary disabled">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger" wire:click="delete({{$file->id}})">
                                <i class="fa fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
