<?php

namespace App\Http\Controllers;

use App\Models\Adhesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RapportController extends Controller
{
    //

    public function index()
    {
    		// $contributionForSevenDay = Adhesion::latest()->groupBy('created_at')->take(7)->sum('montant');

    		// $cont = DB::table('adhesions')
    		// 	->whereDate('created_at', '>=', now()->subDays(7))
    		// 	->select(DB::raw('DATE(created_at) as data'), DB::raw('count(*) as views'))
    		// 	->groupBy('created_at')
    		// 	->get();

    		
    	return view('rapports.index');
    }
}
