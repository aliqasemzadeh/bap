<?php

namespace App\Http\Livewire\Panel\Wallet;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $wallets = [];
        foreach (config('wallet') as $walletItem => $symbol) {
            //$wallet = Wallet::firstOrCreate(['user_id' => auth()->user()->id, 'symbol' => $symbol]);
            $wallets[] = [];
        }

        $wallets = collect($wallets);

        return view('livewire.panel.wallet.index', compact('wallets'))->layout('layouts.panel');
    }
}
