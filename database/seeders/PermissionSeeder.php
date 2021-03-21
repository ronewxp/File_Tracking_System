<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);

        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'app.dashboard',
        ]);


        // Role management
        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Access Roles',
            'slug' => 'app.roles.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create Role',
            'slug' => 'app.roles.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit Role',
            'slug' => 'app.roles.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete Role',
            'slug' => 'app.roles.destroy',
        ]);

        $moduleAppUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Access Users',
            'slug' => 'app.users.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Create User',
            'slug' => 'app.users.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Edit User',
            'slug' => 'app.users.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Delete User',
            'slug' => 'app.users.destroy',
        ]);

        $moduleAppBackup = Module::updateOrCreate(['name' => 'Backup Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackup->id,
            'name' => 'Access Backup',
            'slug' => 'app.backup.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackup->id,
            'name' => 'Create Backup',
            'slug' => 'app.backup.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackup->id,
            'name' => 'Download Backup',
            'slug' => 'app.backup.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackup->id,
            'name' => 'Delete Backup',
            'slug' => 'app.backup.destroy',
        ]);


        $moduleAppOffice = Module::updateOrCreate(['name' => 'Office Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppOffice->id,
            'name' => 'Access Office',
            'slug' => 'app.offices.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppOffice->id,
            'name' => 'Create Office',
            'slug' => 'app.offices.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppOffice->id,
            'name' => 'Edit Office',
            'slug' => 'app.offices.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppOffice->id,
            'name' => 'Delete Office',
            'slug' => 'app.offices.destroy',
        ]);
        

    }
}
