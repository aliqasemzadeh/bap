<div class="modal-dialog">
    <form wire:submit.prevent="create">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('bap.create_user') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('bap.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="email">{{ __('bap.email') }}</label>
                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('bap.email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="first_name">{{ __('bap.first_name') }}</label>
                    <input type="text" wire:model="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="{{ __('bap.first_name') }}">
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="last_name">{{ __('bap.last_name') }}</label>
                    <input type="text" wire:model="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="{{ __('bap.last_name') }}">
                    @error('last_name')
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
                    <label class="form-label" for="password">{{ __('bap.password') }}</label>
                    <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('bap.password') }}">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('bap.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('bap.create') }}</button>
            </div>
        </div>
    </form>
</div>

