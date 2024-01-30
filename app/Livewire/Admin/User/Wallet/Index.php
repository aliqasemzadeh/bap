<?php

namespace App\Livewire\Admin\User\Wallet;

use App\Models\User;
use App\Models\Wallet;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $user_id;

    public function mount($id)
    {
        $this->user_id = $id;
    }

    #[On('admin.user.wallet.index')]

    public function render()
    {
        $user = User::findOrFail($this->user_id);
        $wallets = [];
        foreach (config('wallet') as $symbol => $walletItem) {
            $wallet = Wallet::firstOrCreate(['user_id' => $user->id, 'symbol' => $symbol]);
            $wallets[] = $wallet;
        }

        $wallets = collect($wallets);

        return view('livewire.admin.user.wallet.index', compact('wallets', 'user'));
    }

    public function exportTransactions($wallet_id)
    {

    }

    public function updateBalance($wallet_id)
    {

    }
}
