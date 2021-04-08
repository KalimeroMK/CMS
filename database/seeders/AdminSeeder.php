<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'settings-list',
            'settings-create',
            'settings-edit',
            'settings-delete',
            'source-list',
            'source-create',
            'source-edit',
            'source-delete',
            'categories-list',
            'categories-create',
            'categories-edit',
            'categories-delete',
            'tags-list',
            'tags-create',
            'tags-edit',
            'tags-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'ad-list',
            'ad-create',
            'ad-edit',
            'ad-delete',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete'

        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo([
            'tags-list',
            'tags-create',
            'tags-edit',
            'tags-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ]);

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo([
            'settings-list',
            'settings-create',
            'settings-edit',
            'settings-delete',
            'categories-list',
            'categories-create',
            'categories-edit',
            'categories-delete',
            'tags-list',
            'tags-create',
            'tags-edit',
            'tags-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete'
        ]);

        $role3 = Role::create(['name' => 'super-admin']);
        $role3->givePermissionTo(Permission::all());

        // create demo users
        $user = User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@mail.com',
            'avatar' => '/uploads/author-thumb.jpg',
            'slug' => 'example-user',

        ]);
        $user->assignRole($role1);

        $user = User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@mail.com',
            'avatar' => '/uploads/author-thumb.jpg',
            'slug' => 'example-admin-user',


        ]);
        $user->assignRole($role2);

        $user = User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@mail.com',
            'avatar' => '/uploads/author-thumb.jpg',
            'slug' => 'example-super-admin-user',


        ]);
        $user->assignRole($role3);
    }

}
