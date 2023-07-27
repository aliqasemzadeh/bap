<?php

namespace App\Http\Livewire\Panel\User\Wallet;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.panel.user.wallet.index')->layout('layouts.panel');
    }
}
