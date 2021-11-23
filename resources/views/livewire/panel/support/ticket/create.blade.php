<div>
    <x-slot name="title">
        {{ __('bap.create_ticket') }}
    </x-slot>
    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('panel.dashboard.index') }}">{{ __('bap.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('panel.support.ticket.index') }}">{{ __('bap.tickets') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('panel.support.ticket.create') }}">{{ __('bap.create_ticket') }}</a></li>
        </ol>
    </x-slot>

    <div class="row row-cards">
        <div class="col-12">
            <form wire:submit.prevent="create" class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('bap.create_ticket') }}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">{{ __('bap.title') }}</label>
                        <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="{{ __('bap.title') }}">
                        @error('title')
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
                        <label class="form-label" for="description">{{ __('bap.body') }}</label>
                        <textarea wire:model="body" class="form-control @error('body') is-invalid @enderror" name="body"></textarea>
                        @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-label">{{ __('bap.files') }}</div>
                        <input type="file" multiple wire:model="files" class="form-control @error('files') is-invalid @enderror" name="files">
                        @error('files')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary ms-auto">{{ __('bap.create') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
