<?php

namespace App\Http\Livewire\Admin\Content\FAQ;

use App\Models\Category;
use App\Models\FrequentlyAskedQuestion;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public $question;
    public $answer;

    public function create()
    {
        if(!auth()->user()->can('admin_faq_create')) {
            return abort(403);
        }
        $this->validate([
            'question' => ['string', 'required'],
            'answer' => ['string', 'required'],
        ]);

        $faq = new FrequentlyAskedQuestion();
        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $faq->save();

        $this->emitTo(\App\Http\Livewire\Admin\Content\FAQ\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.created'));
    }


    public function render()
    {
        return view('livewire.admin.content.f-a-q.create');
    }
}
