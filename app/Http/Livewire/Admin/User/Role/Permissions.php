<?php

namespace App\Http\Livewire\Admin\User\Role;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Component
{
    use LivewireAlert;
    public $role;
    public $permission;
    public $search = "";
    protected $updatesQueryString = ['search'];

    protected $listeners = [
        'confirmedDelete',
        'cancelledDelete',
        'deleteSelectedQuery',
        'updatePermissionList' => 'render'
    ];

    public function deletePermission(Permission $permission)
    {
        $this->role->revokePermissionTo($permission->name);
        $this->emit('updatePermissionList');
        $this->alert(
            'success',
            __('bap.removed')
        );
    }

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function assign(Permission $permission)
    {
        $this->role->givePermissionTo($permission->name);
        $this->emit('updatePermissionList');
        $this->alert(
            'success',
            __('bap.added')
        );
    }

    public function render()
    {
        if($this->search != "") {
            $permissions = Permission::where('name', 'like', '%'.$this->search.'%')->get();
        } else {
            $permissions = Permission::all();

        }

        return view('livewire.admin.user.role.permissions', compact('permissions'));
    }
}
