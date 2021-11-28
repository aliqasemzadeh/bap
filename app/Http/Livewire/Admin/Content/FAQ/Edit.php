<?php

namespace App\Http\Livewire\Admin\Content\FAQ;

use App\Models\Category;
use App\Models\FrequentlyAskedQuestion;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $answer;
    public $question;
    public $faq;

    public function mount(FrequentlyAskedQuestion $faq)
    {
        $this->faq = $faq;
        $this->answer = $faq->answer;
        $this->question = $faq->question;
    }

    public function edit()
    {
        if(!auth()->user()->can('admin_faq_edit')) {
            return abort(403);
        }

        $this->validate([
            'question' => ['string', 'required'],
            'answer' => ['string', 'required'],
        ]);

        $faq = $this->faq;
        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $faq->save();

        $this->emitTo(\App\Http\Livewire\Admin\Content\FAQ\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.edited'));
    }


    public function render()
    {
        return view('livewire.admin.content.f-a-q.edit');
    }
}
