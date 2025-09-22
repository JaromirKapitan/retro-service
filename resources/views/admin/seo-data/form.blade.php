<div class="card h-100 seo-form">
    <div class="card-header">
        {{ __('Seo') }}
    </div>

    <div class="card-body">

        <div class="mb-3">
            <label for="seo.title" class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control @error('seo.title') is-invalid @enderror"
                   id="seo.title" name="seo[title]" value="{{ optional($model->seo)->title }}"
            >

            @error('seo.title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="seo.slug" class="form-label">{{ __('Slug') }}</label>
            <input type="text" class="form-control @error('seo.slug') is-invalid @enderror"
                   id="seo.slug" name="seo[slug]" value="{{ optional($model->seo)->slug }}"
            >

            @error('seo.slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="seo.description" class="form-label">{{ __('Description') }}</label>
            <textarea class="form-control @error('seo.description') is-invalid @enderror" id="seo.description"
                      name="seo[description]" maxlength="250"
            >{{ optional($model->seo)->description }}</textarea>

            @error('seo.description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="seo.keywords" class="form-label">{{ __('Keywords') }}</label>
            <textarea class="form-control @error('seo.keywords') is-invalid @enderror" id="seo.keywords"
                      name="seo[keywords]">{{ optional($model->seo)->keywords }}</textarea>

            @error('seo.keywords')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>
