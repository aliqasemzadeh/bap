<div class="col-md-6 col-xl-6">
    <form wire:submit.prevent="upload" class="card">
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
                    <input type="text" wire:model="random_string" value="{{ $random_string }}"  readonly class="form-control" autocomplete="off">

                </div>
            </div>
        </div>
        <div class="card-img-bottom img-responsive img-responsive-16by9" style="background-image: url('{{ asset('images/selfie.png') }}')"></div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('bap.upload') }}<button>
        </div>
    </form>
</div>
