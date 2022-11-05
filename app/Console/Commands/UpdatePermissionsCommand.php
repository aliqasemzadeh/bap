<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdatePermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update permissions base on language files.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        foreach (__('permissions') as $permission => $translate) {
            Permission::firstOrCreate(
                ['guard_name' => 'web', 'name' => $permission]
            );
            $admin->givePermissionTo($permission);
        }
        return Command::SUCCESS;
    }
}
