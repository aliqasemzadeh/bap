<?php

namespace App\Http\Livewire\Panel\User;

use Livewire\Component;

class Mobile extends Component
{
    public $mobile;

    public function mount()
    {

    }

    public function send()
    {

    }

    public function render()
    {
        return view('livewire.panel.user.mobile')->layout('layouts.panel');
    }
}
