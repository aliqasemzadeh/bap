<?php

namespace App\Http\Livewire\Panel\Wallet;

use App\Models\Wallet;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $wallets = [];
        foreach (config('wallet') as $symbol => $walletItem) {
            $wallet = Wallet::firstOrCreate(['user_id' => auth()->user()->id, 'symbol' => $symbol]);
            $wallets[] = $wallet;
        }

        $wallets = collect($wallets);

        return view('livewire.panel.wallet.index', compact('wallets'))->layout('layouts.panel');
    }
}
