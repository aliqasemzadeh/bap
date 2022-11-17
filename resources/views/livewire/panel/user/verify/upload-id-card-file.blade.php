<div class="col-md-6 col-xl-6">
        <form wire:submit.prevent="upload" class="card">
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
                <button type="submit" class="btn btn-primary">{{ __('bap.upload') }}<button>
            </div>
        </form>
    </div>

