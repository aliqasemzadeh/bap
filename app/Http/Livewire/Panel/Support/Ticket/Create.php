<?php

namespace App\Http\Livewire\Panel\Support\Ticket;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\TicketFile;
use App\Models\TicketReplay;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $title;
    public $category_id;
    public $body;
    public $files = [];

    public function create()
    {
        $this->validate([
           'title' => 'required|string',
           'body' => 'required|string',
           'category_id' => 'required|string',
            'files.*' => 'nullable|file|max:1024',
        ]);

        $ticket = new Ticket();
        $ticket->title = $this->title;
        $ticket->category_id = $this->category_id;
        $ticket->user_id = auth()->user()->id;
        $ticket->ip = request()->ip();
        $ticket->save();

        $replay = new TicketReplay();
        $replay->ticket_id = $ticket->id;
        $replay->user_id = auth()->user()->id;
        $replay->body = $this->body;
        $replay->ip = request()->ip();
        $replay->save();

        foreach ($this->files as $file) {
            $fileRecord = new TicketFile();
            $fileRecord->title = $file->getClientOriginalName();
            $fileRecord->file = $file->store('ticket_files');
            $fileRecord->ticket_id = $ticket->id;
            $fileRecord->ticket_replay_id = $replay->id;
            $fileRecord->user_id = auth()->user()->id;
            $fileRecord->save();
        }

        $this->alert('success', __('bap.created'));

        return redirect()->route('panel.support.ticket.view', compact('ticket'));
    }

    public function render()
    {
        $categories = Category::where('type', 'ticket')->get();
        return view('livewire.panel.support.ticket.create', compact('categories'))->layout('layouts.panel');
    }
}
