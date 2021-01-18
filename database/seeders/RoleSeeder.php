<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
        	'name' => 'ADMIN'
        ]);

        Role::create([
        	'name' => 'ADHESION'
        ]);
        Role::create([
            'name' => "CONFIRMATION D'ADHESION"
        ]);

        
    }
}
