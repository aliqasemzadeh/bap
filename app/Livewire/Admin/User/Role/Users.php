<?php

namespace App\Livewire\Admin\User\Role;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    public  $role;

    public function mount($role_id)
    {
        if(!auth()->user()->can('admin_roles_users')) {
            return abort(403);
        }

        $this->role = Role::findOrFail($role_id);
    }

    #[On('admin.user.role.users')]
    public function render()
    {
        return view('livewire.admin.user.role.users');
    }
}
