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

        'edit-role',
        'delete-role',
        'create-role',
        'view-role',

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
        $role2 = Role::create(['name' => 'dev']);
        $role3 = Role::create(['name' => 'admin']);
        $role4 = Role::create(['name' => 'leader']);

        //Role1
        $role1->givePermissionTo('edit-site');
        $role1->givePermissionTo('delete-site');
        $role1->givePermissionTo('create-site');
        $role1->givePermissionTo('view-site');

        $role1->givePermissionTo('edit-user');
        $role1->givePermissionTo('delete-user');
        $role1->givePermissionTo('create-user');
        $role1->givePermissionTo('view-user');

        $role1->givePermissionTo('edit-role');
        $role1->givePermissionTo('delete-role');
        $role1->givePermissionTo('create-role');
        $role1->givePermissionTo('view-role');
        

        //Role4
        $role4->givePermissionTo('edit-user');
        $role4->givePermissionTo('delete-user');
        $role4->givePermissionTo('create-user');
        $role4->givePermissionTo('view-user');

        //Role3
        $role3->givePermissionTo('edit-site');
        $role3->givePermissionTo('delete-site');
        $role3->givePermissionTo('create-site');
        $role3->givePermissionTo('view-site');

        //Role2
        $role2->givePermissionTo('edit-site');
        $role2->givePermissionTo('delete-site');
        $role2->givePermissionTo('create-site');
        $role2->givePermissionTo('view-site');

        $role2->givePermissionTo('edit-user');
        $role2->givePermissionTo('delete-user');
        $role2->givePermissionTo('create-user');
        $role2->givePermissionTo('view-user');

        $role2->givePermissionTo('edit-role');
        $role2->givePermissionTo('delete-role');
        $role2->givePermissionTo('create-role');
        $role2->givePermissionTo('view-role');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        //For dev
        $user = \App\Models\User::factory()->create([
            'name' => 'dev-admin',
            'email' => 'dev-admin@gmail.com',
            'password' => 'Admin@1234!',
        ]);
        $user->assignRole($role2);


        

        //For super-admin
        $user = \App\Models\User::factory()->create([
            'name' => 'super-admin',
            'email' => 'super-admin@gmail.com',
            'password' => 'Admin@1234!',
        ]);
        $user->assignRole($role1);

        //For admin
        // $user = \App\Models\User::find(1);
        // $user->assignRole($role3);
        
        //For Leader
        $user = \App\Models\User::factory()->create([
            'name' => 'Leader',
            'email' => 'leader@gmail.com',
            'password' => 'Admin@1234!',
        ]);
        $user->assignRole($role2);
       
    }
}
