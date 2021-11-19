<?php

namespace App\Http\Livewire\Admin\Setting\Category;

use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $description;
    public $type;
    public $title;
    public $language;
    public $category;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->title = $category->title;
        $this->type = $category->type;
        $this->language = $category->language;
        $this->description = $category->description;
    }

    public function edit()
    {
        if(!auth()->user()->can('admin_category_edit')) {
            return abort(403);
        }
        $this->validate([
            'title' => ['string', 'required'],
            'type' => 'required',
            'language' => 'required',
            'description' => 'nullable',
        ]);

        $category = $this->category;
        $category->title = $this->title;
        $category->type = $this->type;
        $category->language = $this->language;
        $category->description = $this->description;
        $category->save();

        $this->emitTo(\App\Http\Livewire\Admin\Setting\Category\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.edited'));
    }

    public function render()
    {
        return view('livewire.admin.setting.category.edit');
    }
}
