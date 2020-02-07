<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientSchedule;
use Auth;
use App\Http\Resources\ClientSchedule as ClientScheduleResource;
use App\Http\Resources\CleanerClientSchedule as CleanerClientScheduleResource;
use DB;
use App\Models\Notification;

class ClientScheduleController extends Controller
{
    public  function index(){

    }

    public function store(){

    }

    public function show($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

    public function get_client_schedules(){
    	$client_id = Auth::user()->id;
    	$data = ClientSchedule::where('client_id', $client_id)->get();
    	$cs = ClientScheduleResource::collection($data);
    	return response()->json($cs);
    }

    public function get_cleaner_schedules(){
    	$cleaner_id = Auth::user()->id;

    	$data = DB::table('schedules')
        ->join('days', 'days.id', '=', 'schedules.day_id')
    	->join('client_schedules', 'client_schedules.schedule_id', '=', 'schedules.id')
    	->join('users as client', 'client_schedules.client_id', '=', 'client.id')
    	->join('user_profiles as profile', 'profile.user_id', '=', 'client.id')
    	->join('services', 'services.id', '=', 'schedules.service_id')
    	->where('schedules.cleaner_id', $cleaner_id)->select(
    		'schedules.id as schedule_id', 
    		'client_schedules.id as id',
    		'client.id as client_id',
    		'profile.firstname as client_firstname', 
    		'profile.middlename as client_middlename', 
    		'profile.lastname as client_lastname',
    		'services.id as service_id',
    		'services.name as service_name',
    		'services.desc as service_desc',
    		'schedules.start_time',
    		'schedules.end_time',
    		'client_schedules.status',
            'client_schedules.rating',
            'client_schedules.feedback',
            'client_schedules.time_in',
            'client_schedules.time_out',
            'days.desc as day_desc'
    	)->get();

    	$schedules = CleanerClientScheduleResource::collection($data);

    	return response()->json($schedules);
    }

    public function approve($id){
        $cs = ClientSchedule::findOrFail($id);
        $cs->update([
            'status' => 2
        ]);

        $cs->schedule()->update([
            'available' => 1
        ]);

        $notif = Notification::create([
            'sender_id' => $cs->schedule->cleaner_id,
            'notification' => 'approved your booking request',
            'receiver_id' => $cs->client_id,
        ]);


        return response()->json();
    }

    public function reject($id){
        $cs = ClientSchedule::findOrFail($id);
        $cs->update([
            'status' => 4
        ]);

        $cs->schedule()->update([
            'available' => 0
        ]);

        $notif = Notification::create([
            'sender_id' => $cs->schedule->cleaner_id,
            'notification' => 'Schedule Rejected',
            'receiver_id' => $cs->client_id,
        ]);

        return response()->json();
    }

    public function cancel($id){
        $cs = ClientSchedule::findOrFail($id);
        $cs->update([
            'status' => 5
        ]);

        $notif = Notification::create([
            'sender_id' => $cs->client_id,
            'notification' => 'Schedule Cancel',
            'receiver_id' => $cs->schedule->cleaner_id,
        ]);

        $cs->schedule()->update([
            'available' => 0
        ]);

        return response()->json();
    }

    public function remove($id){
        $cs = ClientSchedule::where('id', $id)->first();

        $cs->schedule()->update([
            'available' => 0
        ]);

        $cs->delete();

        return response()->json();
    }   

    public function time_in(Request $request, $id){
        $cs = ClientSchedule::findOrFail($id);
        $cs->update([
            'time_in' => $request->time_in,
        ]);

        $notif = Notification::create([
            'sender_id' => $cs->client_id,
            'notification' => 'Time In Added',
            'receiver_id' => $cs->schedule->cleaner_id,
        ]);

        return response()->json();
    }

    public function time_out(Request $request, $id){
        $cs = ClientSchedule::findOrFail($id);
        $cs->update([
            'status' => 3,
            'time_out' => $request->time_out,
        ]);

        $cs->schedule()->update([
            'available' => 0
        ]);

        $notif = Notification::create([
            'sender_id' => $cs->client_id,
            'notification' => 'Transaction was completed',
            'receiver_id' => $cs->schedule->cleaner_id,
        ]);

        $notif = Notification::create([
            'sender_id' => $cs->schedule->cleaner_id,
            'notification' => 'Transaction was completed',
            'receiver_id' => $cs->slient_id,
        ]);

        return response()->json();
    }

    public function rate(Request $request, $id){

        $cs = ClientSchedule::findOrFail($id);

        $cs->update([
            'rating' => $request->rate,
            'feedback' => $request->feedback,
        ]);

        return response()->json();
    }

    public function rate_client(Request $request, $id){

        $cs = ClientSchedule::findOrFail($id);
        $cs->update([
            'rating_client' => $request->rating,
            'feedback_client' => $request->feedback_client,
        ]);

        return response()->json();
    }


}
