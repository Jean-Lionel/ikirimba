<?php

namespace Database\Seeders;

use Database\Seeders\ProvinceSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
             ProvinceSeeder::class,
             CommuneSeeder::class,

            //RoleSeeder::class
        ]);
    }
}
