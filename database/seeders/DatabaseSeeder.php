<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(AdminSeeder::class);
        Model::reguard();
        $this->call(SettingsTableSeeder::class);
    }
}
