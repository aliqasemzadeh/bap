<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $user;
    public $email;
    public $password;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->email = $user->email;
    }

    public function edit()
    {
        $this->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'password' => 'nullable'
        ]);

        $this->user->email = $this->email;
        if($this->password) {
            $this->user->password = Hash::make($this->password);
        }
        $this->user->save();

        $this->emitTo(\App\Http\Livewire\Admin\User\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.edited'));
    }

    public function render()
    {
        return view('livewire.admin.user.edit');
    }
}
