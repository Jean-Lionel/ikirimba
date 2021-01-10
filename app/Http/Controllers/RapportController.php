<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapportController extends Controller
{
    //

    public function index()
    {
    	return view('rapports.index');
    }
}
