<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Models\Message;
class ContactController extends Controller
{
    public function index(){
    	$user_id = Auth::user()->id;
    	if(Auth::user()->role_id == 1){
			// $contacts = User::with('profile.messages')
			// ->where('role_id', 2)
			// ->where('id', '<>', $user_id)
			// ->get()->sortByDesc('messages.created_at')
			// ->toArray();



			$contacts = User::with(['profile' => function($query){
				$query->with(['messages' => function ($q) {
					$q->orderBy('created_at','desc')->first();
				
				}]);
			}])
			->where('role_id', 2)
			->where('id', '<>', $user_id)
			->where('approved',1)
			->get()
			->toArray();

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
