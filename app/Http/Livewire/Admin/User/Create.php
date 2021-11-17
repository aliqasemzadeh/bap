<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public $email;
    public $password;

    public function create()
    {
        if(!auth()->user()->can('admin_user_create')) {
            return abort(403);
        }
        $this->validate([
           'email' => 'required|email|unique:users',
           'password' => 'required'
        ]);

        User::Create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->emitTo(\App\Http\Livewire\Admin\User\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.created'));
    }

    public function render()
    {
        if(!auth()->user()->can('admin_user_create')) {
            return abort(403);
        }
        return view('livewire.admin.user.create');
    }
}
