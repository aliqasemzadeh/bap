<?php

namespace App\Livewire\App\Shop;

use Livewire\Component;

class CartNavbar extends Component
{

    protected $listeners = ['updateCart' => 'render'];

    public function render()
    {
        return view('livewire.app.shop.cart-navbar');
    }
}
