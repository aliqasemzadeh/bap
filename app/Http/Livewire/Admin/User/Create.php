<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public $email;
    public $password;

    public function create()
    {
        $this->validate([
           'email' => 'required|email|unique:users',
           'password' => 'required'
        ]);

        User::Create([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->emitTo(\App\Http\Livewire\Admin\User\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', 'Basic Alert');
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
