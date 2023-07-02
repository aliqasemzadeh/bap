<div>
    <x-slot name="title">
        {{ __('bap.account_verify') }}
    </x-slot>

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
                                <input type="text" class="form-control" name="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('bap.last_name') }}</label>
                                <input type="text" class="form-control" name="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('bap.national_code') }}</label>
                                <input type="text" class="form-control" name="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('bap.birth_at') }}</label>
                                <input type="text" class="form-control" name="example-text-input">
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
</div>
