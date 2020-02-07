<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\UserProfile;

class ProfileController extends Controller
{
    public function index(){
    	$user_id = Auth::user()->id;

    	$profile = UserProfile::where('user_id', $user_id)->first();

    	return response()->json($profile);
    }

    public function store(Request $request){

    }

    public function update(Request $request, $id){
    	$profile = UserProfile::findOrFail($id);
    	$profile->update([
    		'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number,
            'date_of_birth' => $request->date_of_birth,
    	]);

        return response()->json();
    }

    public function destroy($id){
        
    }
}
