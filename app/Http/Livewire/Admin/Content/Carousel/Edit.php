<?php

namespace App\Http\Livewire\Admin\Content\Carousel;

use App\Models\Carousel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $title;
    public $description;
    public $language;
    public $image;
    public $link;

    protected $listeners = [
        'updateList' => 'render'
    ];

    public function mount(Carousel $carousel)
    {
        $this->article = $carousel;

        $this->description = $carousel->description;
        $this->title = $carousel->title;
        $this->language = $carousel->language;
        $this->link = $carousel->link;
    }

    public function edit()
    {
        if(!auth()->user()->can('admin_carousel_edit')) {
            return abort(403);
        }

        $this->validate([
            'title' => ['string', 'required'],
            'language' => 'required',
            'description' => 'nullable',
            'link' => 'nullable',
            'image' => 'required|image',
        ]);

        $carousel = $this->carousel;

        if($this->image) {
            $carousel->clearMediaCollection();
            $image = $this->image->store('carousels');
            $carousel->addMedia(storage_path('app/' . $image))->toMediaCollection();
        }

        $carousel->title = $this->title;
        $carousel->user_id = auth()->user()->id;
        $carousel->language = $this->language;
        $carousel->description = $this->description;
        $carousel->link = $this->link;
        $carousel->save();


        $this->emitTo(\App\Http\Livewire\Admin\Content\Carousel\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.created'));
    }

    public function render()
    {
        return view('livewire.admin.content.carousel.edit');
    }
}
