<?php

namespace App\Http\Livewire\Panel\User\Wallet;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $userWallets = UserWallet::where('user_id', auth()->user()->id)->get();
        return view('livewire.panel.user.wallet.index', compact('userWallets'))->layout('layouts.panel');
    }
}
