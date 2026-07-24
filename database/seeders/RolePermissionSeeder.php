<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'dashboard',

            'tenant.view',
            'tenant.create',
            'tenant.edit',
            'tenant.delete',

            'contract.view',
            'contract.create',
            'contract.edit',
            'contract.delete',

            'archive.view',

            'recycle.view',

            'database.view'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $admin = Role::firstOrCreate([
            'name' => 'Admin'
        ]);

        $user = Role::firstOrCreate([
            'name' => 'User'
        ]);

        $admin->givePermissionTo(Permission::all());

        $user->givePermissionTo([
            'dashboard',
            'tenant.view',
            'contract.view'
        ]);
    }
}