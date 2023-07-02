<div>
    <x-slot name="title">
        {{ __('bap.account_verify') }}
    </x-slot>
    @if($verify->status == 'accept')
        <div class="alert alert-success" role="alert">
            <h4 class="alert-title">{{ __('bap.request_status') }}</h4>
            <div class="text-muted">{{ __('bap.your_account_verify_accepted') }}</div>
        </div>
    @elseif($verify->status == 'wait')
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-title">{{ __('bap.request_status') }}</h4>
            <div class="text-muted">{{ __('bap.please_wait_our_agent_will_check_your_request') }}</div>
        </div>
    @else
        @if($verify->status == 'reject')
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-title">{{ __('bap.request_status') }}</h4>
                <div class="text-muted">{{ $verify->note }}</div>
            </div>
        @endif

        <div class="row row-cards">
            <livewire:panel.user.verify.upload-id-card-file :verify="$verify"  />
            <livewire:panel.user.verify.upload-verify-file :verify="$verify" />
            <div class="col-md-6 col-xl-12">
                <form  wire:submit.prevent="verify_request" class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('bap.personal_information') }}</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('bap.first_name') }}</label>
                                    <input type="text" wire:model="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('bap.last_name') }}</label>
                                    <input type="text" wire:model="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                                    @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('bap.national_code') }}</label>
                                    <input type="text" wire:model="national_code" class="form-control @error('national_code') is-invalid @enderror" name="national_code">
                                    @error('national_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('bap.birth_at') }}</label>
                                    <input type="text" wire:model="birth_at" class="form-control @error('birth_at') is-invalid @enderror" name="birth_at">
                                    @error('birth_at')
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
    @endif

</div>
