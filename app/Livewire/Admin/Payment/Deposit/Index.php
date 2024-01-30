<?php

namespace App\Livewire\Admin\Payment\Deposit;

use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    #[On('admin.payment.deposit.index')]
    public function render()
    {
        return view('livewire.admin.payment.deposit.index')->layout('layouts.admin');
    }
}
