<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Schedule;
use App\Http\Resources\Schedule as ScheduleResource;
use App\Http\Resources\CleanerSchedule;

class ServiceCleanerController extends Controller
{
    public function service_cleaners($service_id){


    $data = DB::SELECT("SELECT up.firstname, up.middlename, up.lastname, c.id 
    	FROM schedules as sc 
    	left outer join users as c on c.id = sc.cleaner_id 
    	left outer join user_profiles as up on up.user_id = c.id
    	where sc.service_id = $service_id 
    	group by c.id, up.firstname, up.middlename, up.lastname");
    	return response()->json($data);
    }

    public function cleaner_schedules($cleaner_id, $service_id){

    	$data = DB::table('schedules')
    	->leftjoin('client_schedules', 'schedules.id', '=', 'client_schedules.schedule_id')
    	->leftjoin('days', 'days.id', '=', 'schedules.day_id')
        ->where('schedules.available', 0)
    	->where('schedules.cleaner_id', $cleaner_id)
    	->where('schedules.service_id', $service_id)
        ->get();

    	$schedules = CleanerSchedule::collection($data);

    	return response()->json($schedules);
    }
}
