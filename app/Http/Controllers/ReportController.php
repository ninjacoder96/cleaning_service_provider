<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Exports\AdminExport;
use App\Models\ServiceProvider;
use App\Exports\CleanerClientScheduleExport;
use App\Exports\ClientExport;
use App\Exports\ServiceProviderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\ClientSchedule as ClientScheduleResource;
use App\Http\Resources\CleanerClientSchedule as CleanerClientScheduleResource;
use App\Models\ClientSchedule;

class ReportController extends Controller
{
    public function cleaner_report(Request $request){
    	return Excel::download(new CleanerExport, 'cleaner_report.xlsx');
    }

    public function client_report(Request $request){
    	return Excel::download(new ClientExport, 'client_report.xlsx');
    }

    public function service_provider_report(Request $request){
    	return Excel::download(new ServiceProviderExport, 'service_provider_report.xlsx');
    }

    public function admin_report(Request $request){
    	return Excel::download(new AdminExport, 'admin_report.xlsx');
    }

    public function ccse(Request $request){
        return Excel::download(new CleanerClientScheduleExport, 'ccse.xlsx');
    }

    public function admin_create_report(Request $request){

    	if($request->role_id == 2){
            $status = (int)$request->status;
            $data = ServiceProvider::
                with('owner')
                ->whereHas('owner', function($q) use ($status){
                $q->where('is_active', '=',$status);
            })->whereBetween('created_at',[$request->from,$request->to])->get();
            
            return response()->json($data);
        }

    	if($request->role_id == 3){


    	}

    	if($request->role_id == 4){


    	}

    	return response()->json();
    }

    public function client_create_report(Request $request){
        $client_id = Auth::user()->id;
        $from = $request->from;
        $to = $request->to;

        $css = ClientSchedule::where('client_id', $client_id)
        ->where('created_at', '>=', $from)
        ->where('created_at', '<=', $to)
        ->get();

        $data = ClientScheduleResource::collection($css);

        return response()->json($data);
    }

    public function cleaner_create_report(Request $request){
        $cleaner_id = Auth::user()->id;
        $from = $request->from;
        $to = $request->to;

        $data = DB::table('schedules')
        ->join('days', 'days.id', '=', 'schedules.day_id')
        ->join('client_schedules', 'client_schedules.schedule_id', '=', 'schedules.id')
        ->join('users as client', 'client_schedules.client_id', '=', 'client.id')
        ->join('user_profiles as profile', 'profile.user_id', '=', 'client.id')
        ->join('services', 'services.id', '=', 'schedules.service_id')
        ->where('client_schedules.created_at', '>=', $from)
        ->where('client_schedules.created_at', '<=', $to)
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
}
