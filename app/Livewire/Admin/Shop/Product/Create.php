<?php

namespace App\Livewire\Admin\Shop\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $description;
    public $category_brand_id;
    public $category_product_id;
    public $title;
    public $slug;
    public $language;
    public $image;
    public $current_price;
    public $off_price;

    protected $listeners = [
        'updateList' => 'render'
    ];

    public function create()
    {
        if(!auth()->user()->can('admin_product_create')) {
            return abort(403);
        }

        $this->validate([
            'title' => ['string', 'required'],
            'slug' => ['string', 'required'],
            'category_brand_id' => 'required',
            'category_product_id' => 'required',
            'language' => 'required',
            'description' => 'nullable',
            'current_price' => 'required|numeric',
            'off_price' => 'nullable',
            'image' => 'required|image',
        ]);

        $product = new Product();
        $product->title = $this->title;
        $product->slug = Str::slug($this->slug, "-");
        $product->category_brand_id = $this->category_brand_id;
        $product->category_product_id = $this->category_product_id;
        $product->description = $this->description;
        $product->current_price = $this->current_price;
        $product->off_price = $this->off_price;
        $product->language = $this->language;
        $product->user_id = auth()->user()->id;

        $product->save();

        $image = $this->image->store('products');
        $product->addMedia(storage_path('app/' . $image))->toMediaCollection();

        $this->emitTo(\App\Livewire\Admin\Shop\Product\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.created'));
    }
    public function render()
    {
        $brands = Category::where('type', 'brand')->get();
        $types = Category::where('type', 'product')->get();
        return view('livewire.admin.shop.product.create', compact('brands', 'types'));
    }
}
