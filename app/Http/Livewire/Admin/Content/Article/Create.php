<?php

namespace App\Http\Livewire\Admin\Content\Article;

use App\Models\Article;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $description;
    public $body;
    public $category_id;
    public $title;
    public $language;
    public $image;

    protected $listeners = [
        'updateList' => 'render'
    ];

    public function create()
    {
        if(!auth()->user()->can('admin_article_create')) {
            return abort(403);
        }

        $this->validate([
            'title' => ['string', 'required'],
            'category_id' => 'required',
            'language' => 'required',
            'description' => 'nullable',
            'body' => 'nullable',
            'image' => 'required|image',
        ]);

        $article = new Article();
        $article->title = $this->title;
        $article->category_id = $this->category_id;
        $article->user_id = auth()->user()->id;
        $article->body = $this->body;
        $article->language = $this->language;
        $article->description = $this->description;
        $article->save();

        $image = $this->image->store('articles');
        $article->addMedia(storage_path('app/' . $image))->toMediaCollection();

        $this->emitTo(\App\Http\Livewire\Admin\Content\Article\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.created'));
    }

    public function render()
    {
        $categories = Category::where('type', 'article')->get();
        return view('livewire.admin.content.article.create', compact('categories'));
    }
}
