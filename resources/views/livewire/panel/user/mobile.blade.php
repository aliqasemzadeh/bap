<div>
    <x-slot name="title">
        {{ __('bap.mobile') }}
    </x-slot>

    @if(auth()->user()->mobile_verified_at == NULL)
    <div class="row row-cards">
        <div class="col-md-6 col-xl-12">
            <form  wire:submit.prevent="send_message" class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('bap.mobile') }}</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('bap.mobile') }}</label>
                                <input type="text" wire:model="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile">
                                @error('mobile')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary me-auto">{{ __('bap.save') }}</button>
                </div>
            </form>
        </div>
    </div>
    @elseif()

    @endif
</div>
