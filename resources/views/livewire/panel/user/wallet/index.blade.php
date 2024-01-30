<div>
    <x-slot name="title">
        {{ __('bap.user_wallets') }}
    </x-slot>

    <x-slot name="actions">
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <button wire:click="$dispatch('showModal', 'panel.user.wallet.create')" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        {{ __('bap.create_user_wallet') }}
                    </button>
                    <button wire:click="$dispatch('showModal', 'admin.panel.user.wallet.create')" class="btn btn-primary d-sm-none btn-icon" aria-label="Create new report">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </button>
                </div>
            </div>
    </x-slot>
</div>
