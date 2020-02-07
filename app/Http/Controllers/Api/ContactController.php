<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ContactController extends Controller
{
    public function index(){
    	$user_id = Auth::user()->id;
    	if(Auth::user()->role_id == 1){
    		$contacts = User::with('profile')->where('role_id', 2)->where('id', '<>', $user_id)->get();
    	}
    	if(Auth::user()->role_id == 2){
    		$contacts = User::with('profile')->where('role_id', '<>', 2)->where('id', '<>', $user_id)->get();
    	}
    	if(Auth::user()->role_id == 3){
    		$contacts = User::with('profile')->where('role_id', 2)->orWhere('role_id', 4)->where('id', '<>', $user_id)->get();
    	}
    	if(Auth::user()->role_id == 4){
    		$contacts = User::with('profile')->where('role_id', 2)->orWhere('role_id', 3)->where('id', '<>', $user_id)->get();
    	}
        

        return response()->json($contacts);
    }
}
