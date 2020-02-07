<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Auth;
use App\User;
use App\Models\ServiceProvider;

class ServiceProviderServiceController extends Controller
{
    public function index(){
    	$owner_id = Auth::user()->id;
        $word = request()->word;
    	$sp = ServiceProvider::with(['services' => function($query) use ($word) {
            $query->where('name', 'like', '%'.$word.'%')->orWhere('desc', 'like', '%'.$word.'%');
        },])->where('owner_id', $owner_id)->first();
    	$services = $sp->services;

    	return response()->json($services);
    }

    public function store(Request $request){
    	$owner_id = Auth::user()->id;
    	$sp = ServiceProvider::where('owner_id', $owner_id)->first();

    	$service = Service::firstOrCreate([
    		'name' => $request->name,
    		'service_provider_id' => $sp->id,
    	], [
    		'desc'=> $request->desc,
	    	'rate'=> $request->rate,
	        'price'=> $request->price,
    	]);

    	return response()->json();
    }

    public function update(Request $request, $id){
    	$service = Service::findOrFail($id);
    	$service->update([
    		'name' => $request->name,
    		'desc'=> $request->desc,
	    	'rate'=> $request->rate,
	        'price'=> $request->price,
    	]);

    	return response()->json();
    }

    public function destroy($id){
    	$servie = Service::where('id', $id)->delete();

    	return response()->json();
    }
}
