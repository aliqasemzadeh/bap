<div>
    <x-slot name="title">
        {{ __('bap.mobile') }}
    </x-slot>
    <div class="row row-cards">
        <div class="col-md-6 col-xl-12">
            <form  wire:submit.prevent="send" class="card">
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
    @if($wait)
        <div class="row row-cards mt-3">
            <div class="col-md-6 col-xl-12">
                <form  wire:submit.prevent="verify" class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('bap.verify_code') }}</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('bap.verify_code') }}</label>
                                    <input type="text" wire:model="verify_code" class="form-control @error('verify_code') is-invalid @enderror" name="verify_code">
                                    @error('verify_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary me-auto">{{ __('bap.verify') }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
