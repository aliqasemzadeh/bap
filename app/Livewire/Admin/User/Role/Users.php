<?php

namespace App\Livewire\Admin\User\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    public  $role;

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function render()
    {
        return view('livewire.admin.user.role.users');
    }
}
