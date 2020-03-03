<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as Cleaner;
use App\Http\Resources\User as CleanerResource;
use Illuminate\Support\Facades\Hash;
use App\Models\ServiceProvider;
use App\Models\CleanerServiceProvider;
use Auth;
use App\Http\Resources\CleanerServiceProvider as CleanerServiceProviderResource;
use DB;

class CleanerController extends Controller
{
    public function index(){
        $sp = ServiceProvider::where('owner_id', Auth::user()->id)->first();
        $word = request()->word;
        // var_dump($sp);

        $data = CleanerServiceProvider::with(['cleaner', 'service_provider'])
        ->where('service_provider_id', $sp->id)
        ->get();

        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // DB::table('user_profiles as u')->join('cleaner_service_provider as csp', 'csp.cleaner_id', '=', 'u.id')
        // ->where('csp.service_provider_id', $sp->id)
        // ->select('u.user_id as id', 'cleaner.firstname', 'cleaner.middlename', 'cleaner.lastname')
        // ->get();



        $cleaners = CleanerServiceProviderResource::collection($data);

        return response()->json($cleaners);
    }

    public function store(Request $request){
        $sp = ServiceProvider::where('owner_id', Auth::user()->id)->first();

        $cleaner = Cleaner::firstOrCreate([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 3,
        ]);

        $cleaner->profile()->create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number,
            'date_of_birth' => $request->date_of_birth,
        ]);

        $csp = CleanerServiceProvider::firstOrCreate([
            'cleaner_id' => $cleaner->id,
            'service_provider_id' => $sp->id,
        ]);

        return response()->json();
    }

    public function update(Request $request, $id){
        $cleaner = Cleaner::findOrFail($id);
        $cleaner->update([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 3,
        ]);

        $cleaner->profile()->update([
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
        $cleaner = CleanerServiceProvider::where('cleaner_id', $id)->delete();

        return response()->json();
    }

    public function cleaner_service_provider($id){
        $data = DB::SELECT();
    }
}
