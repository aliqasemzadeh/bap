<?php

namespace App\Livewire\Admin\User\Role;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    use LivewireAlert;
    public $name;
    public $role;

    public function mount($role_id)
    {
        if(!auth()->user()->can('admin_roles_edit')) {
            return abort(403);
        }

        $this->role = Role::findOrFail($role_id);
        $this->name = $this->role->name;
    }

    public function edit()
    {
        if(!auth()->user()->can('admin_roles_edit')) {
            return abort(403);
        }

        $this->validate([
            'name' => 'required|string'
        ]);

        $this->role->name = $this->name;
        $this->role->save();

        $this->dispatch('admin.user.role.index');
        $this->dispatch('hideModal');

        $this->alert('success', __('bap.edited'));
    }

    public function render()
    {
        if(!auth()->user()->can('admin_roles_edit')) {
            return abort(403);
        }

        return view('livewire.admin.user.role.edit');
    }
}
