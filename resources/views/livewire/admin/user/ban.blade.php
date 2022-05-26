<div class="modal-dialog">
    <form wire:submit.prevent="ban">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('bap.ban') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('bap.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="comment">{{ __('bap.comment') }}</label>
                    <input type="comment" wire:model="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" placeholder="{{ __('bap.comment') }}">
                    @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="expire">{{ __('bap.expire') }}</label>
                    <input type="date" wire:model="expire" class="form-control @error('expire') is-invalid @enderror" name="expire" placeholder="{{ __('bap.expire') }}">
                    @error('expire')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="permanent">{{ __('bap.permanent') }}</label>
                    <input type="checkbox" wire:model="expire" class="@error('permanent') is-invalid @enderror" name="permanent" placeholder="{{ __('bap.permanent') }}">
                    @error('permanent')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('bap.close') }}</button>
                @if($user->isNotBanned())
                    <button type="submit" class="btn btn-primary">{{ __('bap.ban') }}</button>
                @endif
                @if($user->isBanned())
                    <button type="button" wire:click="unban()" class="btn btn-success">{{ __('bap.unban') }}</button>
                @endif
            </div>
        </div>
    </form>
</div>
