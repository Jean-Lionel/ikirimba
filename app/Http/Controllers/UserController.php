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
}