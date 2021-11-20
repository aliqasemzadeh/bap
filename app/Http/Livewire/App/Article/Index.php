<?php

namespace App\Http\Livewire\App\Article;

use App\Models\Article;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $articles = Article::paginate(15);
        return view('livewire.app.article.index', compact('articles'));
    }
}
