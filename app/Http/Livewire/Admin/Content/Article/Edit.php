<?php

namespace App\Http\Livewire\Admin\Content\Article;

use App\Models\Article;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $description;
    public $body;
    public $category_id;
    public $title;
    public $language;
    public $article;
    public $image;

    public function mount(Article $article)
    {
        $this->article = $article;

        $this->description = $article->description;
        $this->body = $article->body;
        $this->category_id = $article->category_id;
        $this->title = $article->title;
        $this->language = $article->language;
    }

    public function edit()
    {
        if(!auth()->user()->can('admin_article_edit')) {
            return abort(403);
        }

        $this->validate([
            'title' => ['string', 'required'],
            'category_id' => 'required',
            'language' => 'required',
            'description' => 'nullable',
            'body' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $article = $this->article;

        if($this->image) {
            $article->clearMediaCollection();
            $image = $this->image->store('articles');
            $article->addMedia(storage_path('app/' . $image))->toMediaCollection();
        }

        $article->title = $this->title;
        $article->category_id = $this->category_id;
        $article->user_id = auth()->user()->id;
        $article->body = $this->body;
        $article->language = $this->language;
        $article->description = $this->description;
        $article->save();

        $this->emitTo(\App\Http\Livewire\Admin\Content\Article\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.edited'));
    }

    public function render()
    {
        $categories = Category::where('type', 'article')->get();
        return view('livewire.admin.content.article.edit', compact('categories'));
    }
}
