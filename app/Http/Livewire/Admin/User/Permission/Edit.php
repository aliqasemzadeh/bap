<?php

namespace App\Http\Livewire\Admin\User\Permission;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    use LivewireAlert;
    public $name;
    public $permission;

    public function mount(Permission $permission)
    {
        if(!auth()->user()->can('admin_permissions_edit')) {
            return abort(403);
        }

        $this->permission = $permission;
        $this->name = $permission->name;
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

        $this->emitTo(\App\Http\Livewire\Admin\User\Permission\Index::getName(), 'updateList');
        $this->emit('hideModal');

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
