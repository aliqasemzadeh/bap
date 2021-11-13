<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class Create extends Component
{
    public $email;
    public $password;

    public function create()
    {
        $this->validate([
           'email' => 'required|email|unique',
           'password' => 'required'
        ]);

        User::Create([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->emitTo(\App\Http\Livewire\Admin\User\Index::getName(), 'updateList');
        $this->emit('hideModal');


    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
