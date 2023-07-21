<?php

namespace App\Http\Livewire\App\Shop\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class View extends Component
{
    use LivewireAlert;
    public Product $product;
    public $select_count = 0;

    public function addCart(Product $product) : void
    {

       \Cart::add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->current_price,
            'quantity' => 1,
            'attributes' => array(
                'icon' => $product->getMedia()[0]->getFullUrl()
            ),
            'associatedModel' => $product
        ));

        $this->select_count += 1;

        $this->emit('updateCart');
        $this->alert(
            'success',
            __('bap.added')
        );
    }

    public function removeCart(Product $product) : void
    {
        if($this->select_count == 0) {
            $this->alert(
                'warning',
                __('bap.please_add_first')
            );
        } else {
            if(\Cart::get($product->id)->quantity == 1) {
                \Cart::remove($product->id);
                $this->select_count = 0;
            } else {
                \Cart::update($product->id, array(
                    'quantity' => -1,
                ));
                $this->select_count -= 1;
            }

            $this->emit('updateCart');
            $this->alert(
                'success',
                __('bap.removed')
            );
        }

    }

    public function mount(Product $product) : void
    {
        $this->product = $product;
        if(\Cart::get($product->id)) {
            $this->select_count = \Cart::get($product->id)->quantity;
        }
    }
    public function render()
    {
        return view('livewire.app.shop.product.view');
    }
}
