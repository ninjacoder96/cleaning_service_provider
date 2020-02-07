<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as Client;
use App\Http\Resources\User as UserResource;

class ClientController extends Controller
{
    public function index(){
    	$word = request()->word;
    	$data = Client::whereHas('profile', function($query) use ($word){
    		$query->where('firstname', 'like', '%'.$word.'%')
    		->orWhere('middlename', 'like', '%'.$word.'%')
    		->orWhere('lastname', 'like', '%'.$word.'%');
    	})->where('role_id', 4)->get();

    	$clients = UserResource::collection($data);

    	return response()->json($clients);
    }

}
