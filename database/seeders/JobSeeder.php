<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $permissions = [
        'edit-job',
        'delete-job',
        'create-job',
        'view-job',
    ];

    public function run(): void
    {
        $superAdminRole = Role::where(['name'=>'leader'])->first();
        // create permissions for site
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
            $superAdminRole->givePermissionTo($permission);
        }


    }
}
