<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\CommuneSeeder;
use Database\Seeders\ProvinceSeeder;
use Database\Seeders\StatiqueCompteSeeder;

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
             RoleSeeder::class,
             StatiqueCompteSeeder::class,

            //RoleSeeder::class
        ]);
    }
}
