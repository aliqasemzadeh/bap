<div class="modal-dialog modal-xl">
    <form wire:submit.prevent="edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('bap.edit_product') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="$dispatch('hideModal')" aria-label="{{ __('bap.close') }}"></button>
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
                            <label class="form-label" for="slug">{{ __('bap.slug') }}</label>
                            <input type="text" wire:model="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="{{ __('bap.slug') }}">
                            @error('slug')
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
                            <label class="form-label" for="category_brand_id">{{ __('bap.brand') }}</label>
                            <div class="input-group mb-2">
                                <select wire:model="category_brand_id" class="form-control @error('category_brand_id') is-invalid @enderror" name="category_brand_id">
                                    <option></option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                    @endforeach
                                </select>
                                <button wire:click="$dispatch('showModal', 'admin.setting.category.create')" class="btn" type="button">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                                </button>
                            </div>

                            @error('category_brand_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="category_product_id">{{ __('bap.type') }}</label>
                            <div class="input-group mb-2">
                                <select wire:model="category_product_id" class="form-control @error('category_product_id') is-invalid @enderror" name="category_product_id">
                                    <option></option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                                    @endforeach
                                </select>
                                <button wire:click="$dispatch('showModal', 'admin.setting.category.create')" class="btn" type="button">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                                </button>
                            </div>

                            @error('category_product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="current_price">{{ __('bap.current_price') }}</label>
                            <input type="text" wire:model="current_price" class="form-control @error('current_price') is-invalid @enderror" name="current_price" placeholder="{{ __('bap.current_price') }}">
                            @error('current_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="off_price">{{ __('bap.off_price') }}</label>
                            <input type="text" wire:model="off_price" class="form-control @error('off_price') is-invalid @enderror" name="off_price" placeholder="{{ __('bap.off_price') }}">
                            @error('off_price')
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
                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="$dispatch('hideModal')">{{ __('bap.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('bap.edit') }}</button>
            </div>
        </div>
    </form>
</div>

