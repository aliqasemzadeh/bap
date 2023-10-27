<?php

namespace App\Livewire\App\Shop\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.app.shop.product.index', compact('products'));
    }
}
