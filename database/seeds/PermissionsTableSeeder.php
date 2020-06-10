<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('permissions')->delete();

        DB::table('permissions')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'settings-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'settings-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'settings-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'settings-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => 'categories-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            5 =>
                array(
                    'id' => 6,
                    'name' => 'categories-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            6 =>
                array(
                    'id' => 7,
                    'name' => 'categories-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            7 =>
                array(
                    'id' => 8,
                    'name' => 'categories-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            8 =>
                array(
                    'id' => 9,
                    'name' => 'slider-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            9 =>
                array(
                    'id' => 10,
                    'name' => 'slider-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            10 =>
                array(
                    'id' => 11,
                    'name' => 'slider-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            11 =>
                array(
                    'id' => 12,
                    'name' => 'slider-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            12 =>
                array(
                    'id' => 13,
                    'name' => 'accommodations-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            13 =>
                array(
                    'id' => 14,
                    'name' => 'accommodations-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            14 =>
                array(
                    'id' => 15,
                    'name' => 'accommodations-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            15 =>
                array(
                    'id' => 16,
                    'name' => 'accommodations-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            16 =>
                array(
                    'id' => 17,
                    'name' => 'tags-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            17 =>
                array(
                    'id' => 18,
                    'name' => 'tags-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            18 =>
                array(
                    'id' => 19,
                    'name' => 'tags-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            19 =>
                array(
                    'id' => 20,
                    'name' => 'tags-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            20 =>
                array(
                    'id' => 21,
                    'name' => 'staticpage-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            21 =>
                array(
                    'id' => 22,
                    'name' => 'staticpage-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            22 =>
                array(
                    'id' => 23,
                    'name' => 'staticpage-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            23 =>
                array(
                    'id' => 24,
                    'name' => 'staticpage-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            24 =>
                array(
                    'id' => 25,
                    'name' => 'services-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            25 =>
                array(
                    'id' => 26,
                    'name' => 'services-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            26 =>
                array(
                    'id' => 27,
                    'name' => 'services-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            27 =>
                array(
                    'id' => 28,
                    'name' => 'services-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            28 =>
                array(
                    'id' => 29,
                    'name' => 'referral-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            29 =>
                array(
                    'id' => 30,
                    'name' => 'referral-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            30 =>
                array(
                    'id' => 31,
                    'name' => 'referral-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            31 =>
                array(
                    'id' => 32,
                    'name' => 'referral-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            32 =>
                array(
                    'id' => 33,
                    'name' => 'sitemap-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            33 =>
                array(
                    'id' => 34,
                    'name' => 'sitemap-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            34 =>
                array(
                    'id' => 35,
                    'name' => 'sitemap-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            35 =>
                array(
                    'id' => 36,
                    'name' => 'sitemap-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            36 =>
                array(
                    'id' => 37,
                    'name' => 'user-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            37 =>
                array(
                    'id' => 38,
                    'name' => 'user-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            38 =>
                array(
                    'id' => 39,
                    'name' => 'user-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            39 =>
                array(
                    'id' => 40,
                    'name' => 'user-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            40 =>
                array(
                    'id' => 41,
                    'name' => 'role-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            41 =>
                array(
                    'id' => 42,
                    'name' => 'role-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            42 =>
                array(
                    'id' => 43,
                    'name' => 'role-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            43 =>
                array(
                    'id' => 44,
                    'name' => 'role-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            44 =>
                array(
                    'id' => 45,
                    'name' => 'product-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            45 =>
                array(
                    'id' => 46,
                    'name' => 'product-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            46 =>
                array(
                    'id' => 47,
                    'name' => 'product-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            47 =>
                array(
                    'id' => 48,
                    'name' => 'product-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            48 =>
                array(
                    'id' => 49,
                    'name' => 'blog-list',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            49 =>
                array(
                    'id' => 50,
                    'name' => 'blog-create',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            50 =>
                array(
                    'id' => 51,
                    'name' => 'blog-edit',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
            51 =>
                array(
                    'id' => 52,
                    'name' => 'blog-delete',
                    'guard_name' => 'web',
                    'created_at' => '2019-07-04 05:29:51',
                    'updated_at' => '2019-07-04 05:29:51',
                ),
        ));


    }
}