<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\User;
use App\Http\Resources\ServiceProvider as ServiceProviderResource;

class ServiceProviderController extends Controller
{

    public function index()
    {
        
        $data = ServiceProvider::with('services')->has('services')->get();
        // var_dump($data);
        // exit;
        // $service_providers = ServiceProviderResource::collection($data);

        return response()->json($data);
    }
    
    public function countServiceProviders(){
        $data = ServiceProvider::count();
        
        return response()->json($data);
    }

    public function store(Request $request)
    {

    }

    public function show($id){

        $data = ServiceProvider::findOrFail($id);
        
        $service_provider = new ServiceProviderResource($data);

        return response()->json($service_provider);
    }

    public function decline($id){
        ServiceProvider::where('id',$id)->delete();

        return respones()->json();
    }

    public function approved($id)
    {
        $service_provider = ServiceProvider::findOrFail($id);
        $service_provider->update([
            'approved' => 1
        ]);
        $service_provider->owner()->update([
            'approved' => 1
        ]);

        $owner_id = $service_provider->owner_id;
        $use = User::where('id', $owner_id)->update([
            'approved' => 1
        ]);

        return response()->json();
    }

    public function destroy($id)
    {
        //
    }
}
