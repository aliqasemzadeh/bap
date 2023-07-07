<div>
    <x-slot name="title">
        {{ __('bap.wallet') }}
    </x-slot>

    <div class="rows">
        <div class="space-y">
            @foreach($wallets as $wallet)
                <div class="card">
                    <div class="row">
                        <div class="col-auto">
                            <div class="card-body">
                                <div class="avatar avatar-md"
                                     style="background-image: url({{ asset('cryptocurrency-icons/'.strtolower($wallet->symbol).'.svg') }})"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body ps-0 ">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <h3 class="mb-0">{{ __('wallet.' . $wallet->symbol . '.title') }}</h3>
                                    </div>
                                    <div class="col align-self-center">
                                        <button class="btn btn-success">Deposit</button>
                                        <button class="btn btn-danger">Withdraw</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
