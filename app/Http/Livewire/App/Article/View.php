<?php

namespace App\Http\Livewire\App\Article;

use App\Models\Article;
use Livewire\Component;

class View extends Component
{
    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.app.article.view');
    }
}
