<?php

namespace App\Http\Livewire\Panel\Support\Ticket;

use App\Models\Ticket;
use App\Models\TicketFile;
use App\Models\TicketReplay;
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
    public $replays;
    public $files = [];

    protected $rules = [
        'body' => 'required|string',
        'files.*' => 'file|max:2048|nullable',
    ];

    public function downloadFile(TicketFile $file)
    {
        if($file->ticket->user_id != auth()->user()->id) {
            abort('405');
        }

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
        $this->ticket->status = 'user';
        $this->ticket->save();

        $this->story = true;
        $this->body = null;
        $this->files = [];
        $this->replays = TicketReplay::with(['user', 'files'])->where('ticket_id', $this->ticket->id)->latest()->get();
        $this->alert('success', __('bap.replied'));
    }

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
        $this->replays = TicketReplay::with(['user', 'files'])->where('ticket_id', $this->ticket->id)->latest()->get();
    }

    public function render()
    {
        return view('livewire.panel.support.ticket.view')->layout('layouts.panel');
    }
}
