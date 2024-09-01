<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminUserPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    private $permissions = [
        'edit-admin-user',
        'delete-admin-user',
        'create-admin-user',
        'view-admin-user',
    ];


    public function run(): void
    {
         // create permissions for site
         foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $superAdminRole = Role::where(['name'=>'super-admin'])->first();

        $superAdminRole->givePermissionTo('edit-admin-user');
        $superAdminRole->givePermissionTo('delete-admin-user');
        $superAdminRole->givePermissionTo('create-admin-user');
        $superAdminRole->givePermissionTo('view-admin-user');
    }
}
