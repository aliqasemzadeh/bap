<?php

namespace App\Http\Livewire\Admin\User\Role;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    use LivewireAlert;
    public $name;
    public $role;

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required|string'
        ]);

        $this->role->name = $this->name;
        $this->role->save();

        $this->emitTo(\App\Http\Livewire\Admin\User\Permission\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.edited'));
    }

    public function render()
    {
        return view('livewire.admin.user.role.edit');
    }
}
