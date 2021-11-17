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

        foreach (__('bap.permissions') as $permission => $translate) {
            Permission::create(
                ['guard_name' => 'web', 'name' => $permission]
            );
        }



        $admin = Role::create(['name' => 'admin']);

        $admin->givePermissionTo('admin_access');

        $support = Role::create(['name' => 'support']);

        $user = User::findOrFail(1);
        $user->assignRole($admin);
    }
}
