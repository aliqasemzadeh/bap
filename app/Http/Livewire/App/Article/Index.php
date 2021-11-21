<?php

namespace App\Http\Livewire\App\Article;

use App\Models\Article;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $articles = Article::with(['user', 'category'])->where('language', app()->getLocale())->paginate(config('bap.per-page'));
        return view('livewire.app.article.index', compact('articles'));
    }
}
