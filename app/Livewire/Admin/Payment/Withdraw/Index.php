<?php

namespace App\Livewire\Admin\Payment\Withdraw;

use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    #[On('admin.payment.withdraw.index')]
    public function render()
    {
        return view('livewire.admin.payment.withdraw.index')->layout('layouts.admin');
    }
}
