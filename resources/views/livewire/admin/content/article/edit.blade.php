<div class="modal-dialog modal-xl">
    <form wire:submit.prevent="edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('bap.edit_article') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('bap.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-label">{{ __('bap.image') }}</div>
                            <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="title">{{ __('bap.title') }}</label>
                            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="{{ __('bap.title') }}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="type">{{ __('bap.language') }}</label>
                            <select wire:model="language" class="form-control @error('language') is-invalid @enderror" name="language">
                                <option></option>
                                @foreach(config('laravellocalization.supportedLocales') as $key => $value)
                                    <option value="{{ $key }}">{{ config('laravellocalization.supportedLocales.'.$key.'.name') }}</option>
                                @endforeach
                            </select>
                            @error('language')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="category_id">{{ __('bap.category') }}</label>
                            <select wire:model="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">{{ __('bap.description') }}</label>
                            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="description">{{ __('bap.body') }}</label>
                            <textarea wire:model="body" class="form-control @error('body') is-invalid @enderror" name="body"></textarea>
                            @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('bap.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('bap.edit') }}</button>
            </div>
        </div>
    </form>
</div>

