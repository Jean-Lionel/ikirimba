<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

    	// $bubanza_commune_names = ['Bubanza','Gihanga','Musigati','Mpanda','Rugazi'];


    	$allCommunes = [
    		['Bubanza','Gihanga','Musigati','Mpanda','Rugazi'],
    		['Muha','Mukaza','Ntahangwa'],
    		['Isale','Kabezi','Kanyosha (Bujumbura rural)','Mubimbi','Mugongomanga','Mukike','Mutambu','Mutimbuzi','Nyabiraba'],
    		['Bururi','Matana','Mugamba','Rutovu','Songa','Vyanda'],
    		['Cankuzo','Cendajuru','Gisagara','Kigamba','Mishiha'],
    		['Buganda','Bukinanyana','Mabayi','Mugina','Murwi','Rugombo','Buhayira'],
    		['Bugendana','Bukirasazi','Buraza','Giheta','Gishubi','Gitega','Itaba','Makebuko','Mutaho','Nyarusange','Ryansoro'],
    		['Bugenyuzi','Buhiga','Gihogazi','Gitaramuka','Mutumba','Nyabikere','Shombo'],
    		['Butaganzwa','Gahombo','Gatara','Kabarore','Kayanza','Matongo','Muhanga','Muruta','Rango'],
    		['Bugabira','Busoni','Bwambarangwe','Gitobe','Kirundo','Ntega','Vumbi'],
    		['Kayogoro','Kibago','Mabanda','Makamba','Nyanza-Lac','Vugizo'],
    		['Bukeye','Kiganda','Mbuye','Muramvya','Rutegama'],
    		['Buhinyuza','Butihinda','Gashoho','Gasorwe','Giteranyi','Muyinga','Mwakiro'],
    		['Bisoro','Gisozi','Kayokwe','Ndava','Nyabihanga','Rusaka'],
    		['Busiga','Gashikanwa','Kiremba','Marangara','Mwumba','Ngozi','Nyamurenza','Ruhororo','Tangara'],
    		['Bugarama','Burambi','Buyengero','Muhuta','Rumonge'],
    		['Bukemba','Giharo','Gitanga','Mpinga-Kayove','Musongati','Rutana'],

    		['Butaganzwa','Butezi','Bweru','Gisuru','Kinyinya','Nyabitsinda','Ruyigi'],

    	];

    	$arrayCommunes = [];

    	foreach ($allCommunes  as $province_id =>$communes) {
    		
    		foreach ($communes as $key =>$name) {
    			$arrayCommunes[] = [
    				'name' => $name,
    				'province_id' => $province_id  +1

    			];
    			
    		}
    	}


    	Commune::insert($arrayCommunes);

    }
}
