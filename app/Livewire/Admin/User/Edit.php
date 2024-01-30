<?php

namespace App\Livewire\Admin\User;

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
    public $first_name;
    public $last_name;
    public $title;

    public function mount($id)
    {
        if(!auth()->user()->can('admin_user_edit')) {
            return abort(403);
        }

        $this->user = User::findOrFail($id);
        $this->email = $this->user->email;
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->title = $this->user->title;
    }

    public function edit()
    {
        if(!auth()->user()->can('admin_user_edit')) {
            return abort(403);
        }

        $this->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'first_name' => ['string', 'nullable'],
            'last_name' => ['string', 'nullable'],
            'title' => ['string', 'nullable'],
            'password' => 'nullable'
        ]);

        $this->user->email = $this->email;
        $this->user->first_name = $this->first_name;
        $this->user->last_name = $this->last_name;
        $this->user->title = $this->title;
        if($this->password) {
            $this->user->password = Hash::make($this->password);
        }
        $this->user->save();

        $this->dispatchTo(\App\Livewire\Admin\User\Index::getName(), 'updateList');
        $this->dispatch('hideModal');

        $this->alert('success', __('bap.edited'));
    }

    public function render()
    {
        if(!auth()->user()->can('admin_user_edit')) {
            return abort(403);
        }

        return view('livewire.admin.user.edit');
    }
}
