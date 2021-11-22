<?php

namespace App\Http\Livewire\Admin\Support\Ticket;

use Livewire\Component;

class Archive extends Component
{
    public function render()
    {
        return view('livewire.admin.support.ticket.archive')->layout('layouts.admin');
    }
}
