<div>
    <x-slot name="title">
        {{ __('bap.account_verify') }}
    </x-slot>
    <div class="row row-cards">
        <div class="col-md-6 col-xl-6">
            <form action="https://httpbin.org/post" method="post" class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('bap.id_card') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2">
                            <div class="form-label">{{ __('bap.id_card_file') }}</div>
                            <input type="file" wire:model="id_card_file" class="form-control @error('id_card_file') is-invalid @enderror" name="id_card_file">
                            @error('id_card_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-1">

                            <input type="text" value="{{ __('bap.id_should_be_visible') }}" class="form-control" placeholder="subdomain" autocomplete="off">

                        </div>
                    </div>
                </div>
                <div class="card-img-bottom img-responsive img-responsive-16by9" style="background-image: url('{{ asset('images/id-card.png') }}')"></div>
                <div class="card-footer">

                        <a href="#" class="btn btn-primary me-auto">{{ __('bap.save') }}</a>

                </div>
            </form>
        </div>
        <div class="col-md-6 col-xl-6">
            <form action="https://httpbin.org/post" method="post" class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('bap.verify_file') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2">
                            <div class="form-label">{{ __('bap.verify_file') }}</div>
                            <input type="file" wire:model="verify_file" class="form-control @error('verify_file') is-invalid @enderror" name="verify_file">
                            @error('verify_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-1">
                                                        <span class="input-group-text">
                                {{ __('bap.verify_code') }}
                              </span>
                            <input type="text" value="{{ $random_string }}" readonly class="form-control" placeholder="subdomain" autocomplete="off">

                        </div>
                    </div>
                </div>
                <div class="card-img-bottom img-responsive img-responsive-16by9" style="background-image: url('{{ asset('images/selfie.png') }}')"></div>
                <div class="card-footer">

                        <a href="#" class="btn btn-primary">{{ __('bap.save') }}</a>


                </div>
            </form>
        </div>
        <div class="col-md-6 col-xl-12">
            <form action="https://httpbin.org/post" method="post" class="card">
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
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('bap.phone') }}</label>
                                <input type="text" class="form-control" name="example-text-input">
                            </div>
                        </div>

                        <div class="col-md-6"> </div>
                    </div>




                </div>
                <div class="card-footer">
                        <a href="#" class="btn btn-primary me-auto">{{ _('bap.save') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
