<?php

namespace App\Http\Livewire\Admin\User\Wallet;

use Livewire\Component;

class Index extends Component
{
    public $user_id;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function render()
    {
        $user = User::findOrFail($this->user_id);
        $wallets = [];
        foreach (config('wallet') as $symbol => $walletItem) {
            $wallet = Wallet::firstOrCreate(['user_id' => $user->id, 'symbol' => $symbol]);
            $wallets[] = $wallet;
        }

        $wallets = collect($wallets);

        return view('livewire.admin.user.wallet.index', compact('wallets'));
    }
}
