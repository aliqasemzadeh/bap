<?php

namespace App\Http\Livewire\App\FAQ;

use App\Models\FrequentlyAskedQuestion;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $faqs = FrequentlyAskedQuestion::all();
        return view('livewire.app.f-a-q.index', compact('faqs'));
    }
}
