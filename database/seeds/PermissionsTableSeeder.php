<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'settings-list',
            'settings-create',
            'settings-edit',
            'settings-delete',
            'categories-list',
            'categories-create',
            'categories-edit',
            'categories-delete',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'accommodations-list',
            'accommodations-create',
            'accommodations-edit',
            'accommodations-delete',
            'tags-list',
            'tags-create',
            'tags-edit',
            'tags-delete',
            'staticpage-list',
            'staticpage-create',
            'staticpage-edit',
            'staticpage-delete',
            'services-list',
            'services-create',
            'services-edit',
            'services-delete',
            'referral-list',
            'referral-create',
            'referral-edit',
            'referral-delete',
            'sitemap-list',
            'sitemap-create',
            'sitemap-edit',
            'sitemap-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
