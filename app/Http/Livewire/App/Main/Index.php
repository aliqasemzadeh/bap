<?php

namespace App\Http\Livewire\App\Main;

use App\Models\Article;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $articles = Article::where('language', app()->getLocale())->orderBy('created_at', 'DESC')->take(5)->get();
        return view('livewire.app.main.index', compact('articles'));
    }
}
