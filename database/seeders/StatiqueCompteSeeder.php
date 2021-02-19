<?php

namespace Database\Seeders;

use App\Models\StatiqueCompte;
use Illuminate\Database\Seeder;

class StatiqueCompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        StatiqueCompte::create([
        	'name' => '0001',
        	'title' => 'COMPTE DE AEJT',
        	'description' => 'NO DESCRIPTION YET',
        	'montant' => 0

        ]);

        StatiqueCompte::create([
        	'name' => '0002',
        	'title' => 'COMPTE FCC',
        	'description' => 'NO DESCRIPTION YET',
        	'montant' => 0

        ]);

        StatiqueCompte::create([
        	'name' => '0003',
        	'title' => 'COMPTE DES ACTIONNAIRE',
        	'description' => 'NO DESCRIPTION YET',
        	'montant' => 0

        ]);
        StatiqueCompte::create([
        	'name' => '0004',
        	'title' => 'AUTRES COMPTE',
        	'description' => 'NO DESCRIPTION YET',
        	'montant' => 0

        ]);
        StatiqueCompte::create([
        	'name' => '0005',
        	'title' => 'COMPTE',
        	'description' => 'NO DESCRIPTION YET',
        	'montant' => 0

        ]);
    }
}
