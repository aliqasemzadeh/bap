<?php

namespace App\Http\Livewire\Admin\Support\Ticket;

use Livewire\Component;

class View extends Component
{
    public function render()
    {
        return view('livewire.admin.support.ticket.view')->layout('layouts.admin');
    }
}
