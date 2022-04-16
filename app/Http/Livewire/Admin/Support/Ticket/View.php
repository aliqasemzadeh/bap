<?php

namespace App\Http\Livewire\Admin\Support\Ticket;

use App\Models\Ticket;
use App\Models\TicketFile;
use App\Models\TicketReplay;
use App\Notifications\TicketReplied;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class View extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $ticket;
    public $body;
    public $next_action;
    public $files = [];

    protected $listeners = [
        'updateList' => 'render'
    ];

    protected $rules = [
        'body' => 'required|string',
        'files.*' => 'file|max:2048|nullable',
    ];

    public function downloadFile(TicketFile $file)
    {
        return response()->download(storage_path('/app/'.$file->file));
    }

    public function replay()
    {
        $this->validate();

        $replay = new TicketReplay();
        $replay->ticket_id = $this->ticket->id;
        $replay->user_id = auth()->user()->id;
        $replay->body = $this->body;
        $replay->ip = request()->ip();
        $replay->save();

        $this->ticket->user->notify(new TicketReplied($this->ticket));

        foreach ($this->files as $file) {
            $fileRecord = new TicketFile();
            $fileRecord->title = $file->getClientOriginalName();
            $fileRecord->file = $file->store('ticket_files');
            $fileRecord->ticket_id = $this->ticket->id;
            $fileRecord->ticket_replay_id = $replay->id;
            $fileRecord->user_id = auth()->user()->id;
            $fileRecord->save();
        }

        $this->ticket->updated_at = Carbon::now()->toString();
        $this->ticket->status = 'answer';
        $this->ticket->save();

        $this->story = true;
        $this->body = null;
        $this->files = [];

        if($this->next_action == 'next') {
            if($next = $this->ticket->next()) {
                return redirect()->route('admin.support.ticket.view', ['ticket' => $next]);
            } else {
                return redirect()->route('admin.support.ticket.index');
            }
        }

        $this->emitTo(\App\Http\Livewire\Admin\Support\Ticket\Index::getName(), 'updateList');

        $this->alert('success', __('bap.replied'));
    }

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render()
    {
        $replays = TicketReplay::with(['user', 'files'])->where('ticket_id', $this->ticket->id)->latest()->get();
        return view('livewire.admin.support.ticket.view', compact('replays'))->layout('layouts.admin');
    }
}
