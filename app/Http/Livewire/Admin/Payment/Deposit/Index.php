<?php

namespace App\Http\Livewire\Admin\Payment\Deposit;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.payment.deposit.index')->layout('layouts.admin');
    }
}
