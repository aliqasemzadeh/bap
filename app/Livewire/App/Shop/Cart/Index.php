<?php

namespace App\Livewire\App\Shop\Cart;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    protected $listeners = ['updateCartIndex' => 'render'];
    public function removeItem($itemId)
    {
        \Cart::remove($itemId);
        $this->emit('updateCartIndex');
    }
    public function render()
    {
        return view('livewire.app.shop.cart.index');
    }
}
