<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use App\Http\Resources\User as UserResource;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
class UserController extends Controller
{
   
    public function index(){

        $word = request()->word;
        // $users =  User::join('user_profiles','users.id','=','user_profile.user_id')->get();
        $data = User::whereHas('profile', function($query) use ($word){
            $query->where('firstname', 'like', '%'.$word.'%')
            ->orWhere('middlename', 'like', '%'.$word.'%')
            ->orWhere('lastname', 'like', '%'.$word.'%');
        })->where('id', '<>', Auth::user()->id)->where('id', '<>', 1)
        ->whereNotIn('role_id',[3,4])->get();
        $users = UserResource::collection($data);


    	return response()->json($users);

    }

    public function getRoles(){
        $roles = Role::all()->toArray();

        return response()->json($roles);
    }

    public function store(){

    }

    public function update(Request $request){

    }

    public function destroy(){

    }

    public function activate($id){
    	$user = User::findOrFail($id);
    	$user->update([
    		'is_active' => 1
    	]);

    	return response()->json();
    }

    public function deactivate($id){
        $user = User::findOrFail($id);
    	$user->update([
    		'is_active' => 0
        ]);

       


    	return response()->json();
    }

    public function blocked_client($id){

    }

    public function change_password(Request $request){
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json();
    }

}
