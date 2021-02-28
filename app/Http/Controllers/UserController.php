<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * For managing user
 */


class UserController extends Controller
{
    
    public function index(){
    	
    	return view('users.index');
    }

    public function info(){

    	return view('users.info');
    }
}