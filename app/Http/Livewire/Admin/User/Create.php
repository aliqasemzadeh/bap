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

    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
