<?php

namespace App\Http\Livewire\App\Shop\Cart;

use App\Models\UserAddress;
use Livewire\Component;

class Checkout extends Component
{

    public function render()
    {
        $userAddresses = UserAddress::where('user_id', auth()->user()->id)->get();
        return view('livewire.app.shop.cart.checkout', compact('userAddresses'));
    }
}
