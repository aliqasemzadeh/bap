<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminPermission = Permission::create(['name' => 'permissions.admin_access']);

        $admin = Role::create(['name' => 'roles.admin']);

        $admin->givePermissionTo($adminPermission);

        $support = Role::create(['name' => 'roles.support']);

        $user = User::findOrFail(1);
        $user->assignRole($admin);
    }
}
