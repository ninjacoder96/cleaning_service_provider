<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientSchedule;
use Auth;
use App\Models\Notification;
use App\Models\ServiceProvider;
use DB;
use App\Http\Resources\ServiceProviderBooking as ServiceProviderBookingResource;

class BookingController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
    	$client_id = Auth::user()->id;

    	$cs = ClientSchedule::create([
    		'client_id' => $client_id,
    		'schedule_id' => $request->schedule_id,
    		'status' => 1,
    		'landmark_address' => $request->landmark_address
    	]);

        $cs->schedule()->update([
            'available' => 0
        ]);
        
        $receiver_id = $cs->schedule->cleaner_id;
        $service_name = $cs->schedule->service->name;

        $notif = Notification::create([
            'sender_id' => $client_id,
            'notification' => 'request for '.$service_name,
            'receiver_id' => $receiver_id,
        ]);

    	return response()->json();
    }

    public function update(Request $request, $id){

    }

    public function decline($id){
    	$cs = ClientSchedule::findOrFail($id);
    	$cs->update([
    		'status' => 4
    	]);
    }

    public function service_provider_booking(){

        $service_provider = ServiceProvider::where('owner_id', Auth::user()->id)->first();
        $service_provider_id = $service_provider->id;

        $data = DB::table('schedules as sc')
        ->leftjoin('client_schedules as cs', 'cs.schedule_id', '=', 'sc.id')
        ->leftjoin('services as s', 's.id', '=', 'sc.service_id')
        ->leftjoin('user_profiles as cleaner', 'cleaner.user_id', '=', 'sc.cleaner_id')
        ->leftjoin('user_profiles as client', 'client.user_id', '=', 'cs.client_id')
        ->leftjoin('days as d', 'd.id', '=', 'sc.day_id')
        ->where('s.service_provider_id', '=', $service_provider_id)
        ->where('cs.status', '<>', null)
        ->select('sc.service_id',
            's.name as service_name', 
            'cleaner.firstname as cleaner_firstname', 
            'cleaner.middlename as cleaner_middlename', 
            'cleaner.lastname as cleaner_lastname',
            'client.firstname as client_firstname',
            'client.middlename as client_middlename', 
            'client.lastname as client_lastname', 
            'sc.start_time', 
            'sc.end_time',
            'cs.rating',
            'cs.feedback',
            'd.desc as day_desc',
            'sc.day_id',)->get();
        $service_provider_bookings = ServiceProviderBookingResource::collection($data);

        return response()->json($service_provider_bookings);
    }
}
