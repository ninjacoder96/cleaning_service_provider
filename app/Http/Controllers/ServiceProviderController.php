<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ServiceProvider;
use App\Models\Notification;
use App\User;


class ServiceProviderController extends Controller
{
    public function index(){

    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:service_providers|max:255',
        ]);

    	$owner_id = Auth::user()->id;

    	$image_name_1 = $request->name.".jpg";
    	$image_name_2 = $request->business_permit_no.".jpg";

    	$request->company_img->move(public_path('img/service_providers/logos'), $image_name_1);
    	$request->permit_img->move(public_path('img/service_providers/permits'), $image_name_2);

    	$sp = ServiceProvider::firstOrCreate([
    		'owner_id' => $owner_id
    	], [
    		'name' => $request->name,
    		'company_img' => $image_name_1,
    		'address' => $request->address,
    		'mobile_number' => $request->mobile_number,
    		'contact_person' => $request->contact_person,
    		'business_permit_no' => $request->business_permit_no,
    		'permit_img' => $image_name_2,
    	]);

        $admin_id = User::where('role_id', 1)->first();

        $notif = Notification::create([
            'sender_id' => $owner_id,
            'notification' => 'Transaction Completed',
            'receiver_id' => $admin_id,
        ]);

    	return redirect('\ownerprofile');
    }

    public function update(){

    }

    public function activate($id){
    	$sp = ServiceProvider::findOrFail($id);
    	$sp->update([
    		'approved' => 1,
    	]);

    	$sp->owner()->update([
    		'approved' => 1
    	]);

    	return response()->json();
    }

    public function deactivate($id){
    	$sp = ServiceProvider::findOrFail($id);
    	$sp->update([
    		'approved' => 2,
    	]);

    	$sp->owner()->update([
    		'approved' => 2,
    	]);

    	return response()->json();
    }

    public function destrot($id){
    	$sp = ServicerPorvider::findOrFail($id);


    	return response()->json();
    }
}
