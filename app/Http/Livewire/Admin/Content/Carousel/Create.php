<?php

namespace App\Http\Livewire\Admin\Content\Carousel;

use App\Models\Carousel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $title;
    public $description;
    public $language;
    public $image;

    protected $listeners = [
        'updateList' => 'render'
    ];

    public function create()
    {
        if(!auth()->user()->can('admin_carousel_create')) {
            return abort(403);
        }

        $this->validate([
            'title' => ['string', 'required'],
            'language' => 'required',
            'description' => 'nullable',
            'image' => 'required|image',
        ]);

        $carousel = new Carousel();
        $carousel->title = $this->title;
        $carousel->user_id = auth()->user()->id;
        $carousel->language = $this->language;
        $carousel->description = $this->description;
        $carousel->save();

        $image = $this->image->store('carousels');
        $carousel->addMedia(storage_path('app/' . $image))->toMediaCollection();

        $this->emitTo(\App\Http\Livewire\Admin\Content\Carousel\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.created'));
    }

    public function render()
    {
        return view('livewire.admin.content.carousel.create');
    }
}
