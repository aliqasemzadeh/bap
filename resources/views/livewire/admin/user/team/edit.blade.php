<div class="modal-dialog">
    <form wire:submit.prevent="edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('bap.edit_team') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('bap.close') }}"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="name">{{ __('bap.name') }}</label>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('bap.name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="search">{{ __('bap.user') }}</label>
                    <input type="text" wire:model="search" class="form-control @error('search') is-invalid @enderror" name="search" placeholder="{{ __('bap.user') }}">
                    @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <ul class="list-group">
                        @foreach($users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $user->name }}
                                @if($user_id != $user->id)
                                    <button wire:click="setUser({{ $user->id }})" type="button" class="btn btn-primary btn-icon btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                    </button>
                                @else
                                    <button wire:click="setUser({{ $user->id }})" type="button" class="btn btn-success btn-icon btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 12l5 5l10 -10"></path>
                                            <path d="M2 12l5 5m5 -5l5 -5"></path>
                                        </svg>
                                    </button>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="personal">{{ __('bap.personal') }}</label>
                    <select  wire:model="personal" class="form-control @error('personal') is-invalid @enderror" name="personal" placeholder="{{ __('bap.personal') }}">
                        <option></option>
                        <option value="0">{{ __('bap.public_team') }}</option>
                        <option value="1">{{ __('bap.personal_team') }}</option>
                    </select>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('bap.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('bap.edit') }}</button>
            </div>
        </div>
    </form>
</div>

