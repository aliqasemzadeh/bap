<?php

namespace App\Http\Livewire\Panel\Wallet;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $wallets = [];
        foreach (config('wallet.networks') as $symbol) {
            $wallet = Wallet::firstOrCreate(['user_id' => auth()->user()->id, 'symbol' => $symbol]);
            $wallets[] = $wallet;
        }

        $wallets = collect($wallets);

        return view('livewire.panel.wallet.index')->layout('layouts.panel');
    }
}
