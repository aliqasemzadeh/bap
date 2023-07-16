<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('bap.wallet') }}: {{ $user->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('bap.close') }}"></button>
        </div>
        <div class="modal-body">
            <div class="row row-cards">

                @foreach($wallets as $wallet)
                    <div class="col-12">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto d-none d-sm-block">
                                        <span class="avatar" style="background-image: url({{ asset('cryptocurrency-icons/'.strtolower($wallet->symbol).'.svg') }})"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="" class="text-body d-block">{{ $wallet->symbol }}</a>
                                    </div>
                                    <div class="col text-center">
                                    <span class="usdt-price">
                                        {{ __('bap.balance') }}
                                        :{{ number_format($wallet->balance, config('wallet.networks.'.$wallet->network.'.precision')) }}
                                    </span>
                                    </div>

                                    <div class="col text-center">

                                    </div>


                                    <div class="col text-end">

                                        <button  wire:click="exportTransactions({{ $wallet->id }})" class="btn btn-purple btn-sm">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/rotate -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                <path d="M12 17v-6"></path>
                                                <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
                                            </svg>
                                            <span class="d-none d-sm-inline-block">{{ __('bap.export') }}</span>
                                        </button>
                                        <button  wire:click="updateBalance({{ $wallet->id }})" class="btn btn-primary btn-sm">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/rotate -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.95 11a8 8 0 1 0 -.5 4m.5 5v-5h-5" /></svg>
                                            <span class="d-none d-sm-inline-block">{{ __('bap.update_wallet_balance') }}</span>
                                        </button>

                                        <button onclick="Livewire.emit('showModal', 'admin.user.wallet.transactions', '{{ $wallet->id }}')" class="btn btn-lime btn-sm">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/list -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="9" y1="6" x2="20" y2="6" /><line x1="9" y1="12" x2="20" y2="12" /><line x1="9" y1="18" x2="20" y2="18" /><line x1="5" y1="6" x2="5" y2="6.01" /><line x1="5" y1="12" x2="5" y2="12.01" /><line x1="5" y1="18" x2="5" y2="18.01" /></svg>
                                            <span class="d-none d-sm-inline-block">{{ __('bap.transaction_list') }}</span>
                                        </button>

                                        <button  onclick="Livewire.emit('showModal', 'admin.user.wallet.create-transaction', '{{ $wallet->id }}')" class="btn btn-danger btn-sm">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/square-plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="16" height="16" rx="2" /><line x1="9" y1="12" x2="15" y2="12" /><line x1="12" y1="9" x2="12" y2="15" /></svg>
                                            <span class="d-none d-sm-inline-block">{{ __('bap.create_transaction') }}</span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
