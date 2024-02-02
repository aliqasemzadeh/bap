<?php

namespace App\Livewire\Admin\User\Permission;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $name;
    public $permission;

    public function mount($permission_id)
    {
        if(!auth()->user()->can('admin_permissions_edit')) {
            return abort(403);
        }

        $this->permission = \Spatie\Permission\Models\Permission::findOrFail($permission_id);
        $this->name = $this->permission->name;
    }

    public function edit()
    {
        if(!auth()->user()->can('admin_permissions_edit')) {
            return abort(403);
        }

        $this->validate([
            'name' => 'required|string'
        ]);

        $this->permission->name = $this->name;
        $this->permission->save();

        $this->dispatchTo(\App\Livewire\Admin\User\Permission\Index::getName(), 'updateList');
        $this->dispatch('hideModal');

        $this->alert('success', __('bap.edited'));
    }

    public function render()
    {
        if(!auth()->user()->can('admin_permissions_edit')) {
            return abort(403);
        }

        return view('livewire.admin.user.permission.edit');
    }
}
