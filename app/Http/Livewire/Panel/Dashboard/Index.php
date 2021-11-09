<?php

namespace App\Http\Livewire\Panel\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.panel.dashboard.index')->layout('layouts.panel');
    }
}
