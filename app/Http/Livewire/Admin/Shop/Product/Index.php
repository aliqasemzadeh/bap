<?php

namespace App\Http\Livewire\Admin\Shop\Product;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        if(!auth()->user()->can('admin_user_index')) {
            return abort(403);
        }
        $users = Product::filter(['search' => $this->search])->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.shop.product.index', compact('users'))->layout('layouts.admin');
    }
}
