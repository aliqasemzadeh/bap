<?php

namespace App\Livewire\Admin\Shop\Order;

use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    #[On('admin.shop.order.index')]
    public function render()
    {
        return view('livewire.admin.shop.order.index');
    }
}
