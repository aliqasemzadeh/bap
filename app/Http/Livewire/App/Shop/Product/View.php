<?php

namespace App\Http\Livewire\App\Shop\Product;

use App\Models\Product;
use Livewire\Component;

class View extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.app.shop.product.view');
    }
}
