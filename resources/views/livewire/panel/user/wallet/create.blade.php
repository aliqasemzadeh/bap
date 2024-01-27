<div>
    <div class="modal-dialog">
        <form wire:submit.prevent="create">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('bap.create_user_wallet') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="$dispatch('hideModal')" aria-label="{{ __('bap.close') }}"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label" for="title">{{ __('bap.title') }}</label>
                        <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="{{ __('bap.title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="type">{{ __('bap.network') }}</label>
                        <select wire:model="network" class="form-control @error('network') is-invalid @enderror" name="network">
                            <option></option>
                            @foreach(__('bap.network') as $key => $value)
                                <option value="{{ $key }}">{{ __($value['title']) }}</option>
                            @endforeach
                        </select>
                        @error('network')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="address">{{ __('bap.address') }}</label>
                        <input type="text" wire:model="address" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="{{ __('bap.address') }}">
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="memo">{{ __('bap.memo') }}</label>
                        <input type="text" wire:model="memo" class="form-control @error('memo') is-invalid @enderror" name="memo" placeholder="{{ __('bap.memo') }}">
                        @error('memo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="$dispatch('hideModal')">{{ __('bap.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('bap.create') }}</button>
                </div>
            </div>
        </form>
    </div>


</div>
