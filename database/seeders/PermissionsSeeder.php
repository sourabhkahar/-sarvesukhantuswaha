<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $permissions = [
        'edit-site',
        'delete-site',
        'create-site',
        'view-site',
        'edit-user',
        'delete-user',
        'create-user',
        'view-user'
    ];

    // private $roles = [
    //     'super-admin',
    //     'leader',
    //     'admin',
    //     'dev'
    // ];
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions for site
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // foreach ($this->roles as $role) {
        //     $role = Permission::create(['name' => $role]);
        // }
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'super-admin']);
        $role2 = Role::create(['name' => 'leader']);
        $role3 = Role::create(['name' => 'admin']);

        //Role1
        $role1->givePermissionTo('edit-site');
        $role1->givePermissionTo('delete-site');
        $role1->givePermissionTo('create-site');
        $role1->givePermissionTo('view-site');

        $role1->givePermissionTo('edit-user');
        $role1->givePermissionTo('delete-user');
        $role1->givePermissionTo('create-user');
        $role1->givePermissionTo('view-user');

        //Role2
        $role2->givePermissionTo('edit-user');
        $role2->givePermissionTo('delete-user');
        $role2->givePermissionTo('create-user');
        $role2->givePermissionTo('view-user');

        //Role3
        $role3->givePermissionTo('edit-site');
        $role3->givePermissionTo('delete-site');
        $role3->givePermissionTo('create-site');
        $role3->givePermissionTo('view-site');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $user = \App\Models\User::factory()->create([
            'name' => 'super-admin',
            'email' => 'super-admin@super.com',
        ]);
        $user->assignRole($role1);

        // create demo users
        $user = \App\Models\User::find(1);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Leader',
            'email' => 'leader@leader.com',
        ]);
        $user->assignRole($role2);
       
    }
}
