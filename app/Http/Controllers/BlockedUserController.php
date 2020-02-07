<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlockedUser;
use Auth;
use App\Models\Notification;

class BlockedUserController extends Controller
{
    public function index(){


    }

    public function store(Request $request){
    	$blocker_id = Auth::user()->id;
    	$block = BlockedUser::create([
    		'blocker_id' => $blocker_id,
    		'blocked_id' => $request->blocked_id,
    		'reason' => $request->reason,
    	]);

    	return response()->json();
    }

    public function update(Request $request, $id){
    	
    }

    public function destroy($id){


    }
}
