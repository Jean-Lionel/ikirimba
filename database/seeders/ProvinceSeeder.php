<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        //

    	$provinces = [

    		[
    			'name' => 'Bubanza',
    			'id' => 1
    		],
    		[
    			'name' => 'Bujumbura Mairie', 
    			'id' => 2
    		],
    		[
    			'name' => 'Bujumbura', 
    			'id' => 3
    		],
    		[
    			'name' => 'Bururi',
    			'id' => 4
    		],
    		[
    			'name' => 'Cankuzo', 
    			'id' => 5
    		],
    		[
    			'name' => 'Cibitoke', 
    			'id' => 6
    		],
    		[
    			'name' => 'Gitega', 
    			'id' => 7
    		],
    		[
    			'name' => 'Karuzi', 
    			'id' => 8
    		], 
    		[
    			'name' => 'Kayanza', 
    			'id' => 9
    		],
    		[
    			'name' => 'Kirundo', 
    			'id' => 10
    		],
    		[
    			'name' => 'Makamba', 
    			'id' => 11
    		],
    		[
    			'name' => 'Muramvya', 
    			'id' => 12
    		],
    		[
    			'name' => 'Muyinga', 
    			'id' => 13
    		],
    		[
    			'name' => 'Mwaro', 
    			'id' => 14
    		],
    		[
    			'name' => 'Ngozi', 
    			'id' => 15
    		],
    		[
    			'name' => 'Rumonge', 
    			'id' => 16
    		],
    		[
    			'name' => 'Rutana', 
    			'id' => 17
    		], 
    		[
    			'name' => 'Ruyigi', 
    			'id' => 18
    		],


    	];


    	Province::insert($provinces);
    }
}
