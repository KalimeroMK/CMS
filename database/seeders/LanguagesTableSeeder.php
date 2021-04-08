<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();

        DB::table('languages')->insert([
            0 =>
                [
                    'id' => 1,
                    'name' => 'Macedonian',
                    'country' => 'MKD',
                    'code' => 'mk',
                    'iso' => 1000,
                    'created_at' => '2020-11-18 03:16:11',
                    'updated_at' => '2020-11-18 03:16:11',
                ],
            1 =>
                [
                    'id' => 2,
                    'name' => 'English',
                    'country' => 'ENG',
                    'code' => 'en',
                    'iso' => 1000,
                    'created_at' => '2020-11-18 03:16:56',
                    'updated_at' => '2020-11-18 03:16:56',
                ],
        ]);
    }
}