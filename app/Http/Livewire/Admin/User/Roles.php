<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use LivewireAlert;
    public $user;
    public $permission;
    public $search = "";
    protected $updatesQueryString = ['search'];

    protected $listeners = [
        'confirmedDeleteRole',
        'cancelledDeleteRole',
        'deleteSelectedQuery',
        'updateRoleList' => 'render'
    ];

    public function mount(User $user)
    {
        if(!auth()->user()->can('admin_user_roles')) {
            return abort(403);
        }
        $this->user = $user;
    }

    public function deleteRole(Role $role)
    {
        if(!auth()->user()->can('admin_user_roles')) {
            return abort(403);
        }
        $this->confirm(__('bap.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('bap.cancel'),
            'onConfirmed' => 'confirmedDeleteRole',
            'onCancelled' => 'cancelledDeleteRole'
        ]);
        $this->role = $role;
    }

    public function assign(Role $role)
    {
        if(!auth()->user()->can('admin_user_roles')) {
            return abort(403);
        }
        $this->user->assignRole($role->name);
        $this->emit('updateRoleList');
        $this->alert(
            'success',
            __('bap.added')
        );
    }

    public function confirmedDeleteRole()
    {
        if(!auth()->user()->can('admin_user_roles')) {
            return abort(403);
        }
        $this->user->removeRole($this->role->name);
        $this->emit('updatePermissionList');
        $this->alert(
            'success',
            __('bap.removed')
        );
    }

    public function cancelledDeleteRole()
    {
        $this->alert(
            'success',
            __('bap.cancelled')
        );
    }

    public function render()
    {
        if(!auth()->user()->can('admin_user_roles')) {
            return abort(403);
        }
        if($this->search != "") {
            $roles = Role::where('name', 'like', '%'.$this->search.'%')->get();
        } else {
            $roles = Role::all();

        }
        return view('livewire.admin.user.roles', compact('roles'));
    }
}
