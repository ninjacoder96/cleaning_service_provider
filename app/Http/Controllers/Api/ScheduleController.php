<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Schedule;
use App\Http\Resources\Schedule as ScheduleResource;

class ScheduleController extends Controller
{

    public function index()
    {
        $cleaner_id = Auth::user()->id;

        $data = Schedule::where('cleaner_id', $cleaner_id)->orderBy('start_time', 'asc')->get();
        $schedules = ScheduleResource::collection($data);
        return response()->json($schedules);
    }


    public function check(){

    }

    public function store(Request $request)
    {
        $cleaner_id = Auth::id();

        $day = $request->days;
        $count = count($day);

        for($i=0; $i < $count; $i++){
             $schedule = Schedule::firstOrcreate([
                'cleaner_id' => $cleaner_id,
                'service_id' => $request->service_id,
                'day_id' => $day[$i],
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
        }

        return response()->json();
    }

    public function update(Request $request, $id)
    {
        $cleaner_id = Auth::id();

        $schedule = Schedule::findOrFail($id);

        $schedules = Schedule::where('day_id', $request->day_id)
        ->orWhere('start_time', $request->start_time)
        ->orWhere('end_time', $request->end_time)
        ->orWhereBetween('start_time', [$request->start_time, $request->end_time])
        ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
        ->count();

        if($schedules < 1){
            $schedule->update([
                'cleaner_id' => $cleaner_id,
                'service_id' => $request->service_id,
                'day_id' => $request->day_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);

            return response()->json(1);
        } else {
            return response()->json(2);
        } 
    }

    public function destroy($id)
    {
        $schedule = Schedule::where('id', $id)->delete();
    }

    public function monday(){
        $cleaner_id = Auth::user()->id;

        $data = Schedule::where('cleaner_id', $cleaner_id)
        ->where('day_id', 2)
        ->orderBy('start_time', 'asc')->get();

        $schedules = ScheduleResource::collection($data);

        return response()->json($schedules);
    }

    public function tuesday(){
        $cleaner_id = Auth::user()->id;

        $data = Schedule::where('cleaner_id', $cleaner_id)
        ->where('day_id', 3)
        ->orderBy('start_time', 'asc')->get();

        $schedules = ScheduleResource::collection($data);

        return response()->json($schedules);
    }

    public function wednesday(){
        $cleaner_id = Auth::user()->id;

        $data = Schedule::where('cleaner_id', $cleaner_id)
        ->where('day_id', 4)
        ->orderBy('start_time', 'asc')->get();

        $schedules = ScheduleResource::collection($data);

        return response()->json($schedules);
    }

    public function thursday(){
        $cleaner_id = Auth::user()->id;

        $data = Schedule::where('cleaner_id', $cleaner_id)
        ->where('day_id', 5)
        ->orderBy('start_time', 'asc')->get();

        $schedules = ScheduleResource::collection($data);

        return response()->json($schedules);
    }

    public function friday(){
        $cleaner_id = Auth::user()->id;

        $data = Schedule::where('cleaner_id', $cleaner_id)
        ->where('day_id', 6)
        ->orderBy('start_time', 'asc')->get();

        $schedules = ScheduleResource::collection($data);

        return response()->json($schedules);
    }

    public function saturday(){
        $cleaner_id = Auth::user()->id;

        $data = Schedule::where('cleaner_id', $cleaner_id)
        ->where('day_id', 7)
        ->orderBy('start_time', 'asc')->get();

        $schedules = ScheduleResource::collection($data);

        return response()->json($schedules);
    }

    public function sunday(){
        $cleaner_id = Auth::user()->id;

        $data = Schedule::where('cleaner_id', $cleaner_id)
        ->where('day_id', 1)
        ->orderBy('start_time', 'asc')->get();

        $schedules = ScheduleResource::collection($data);

        return response()->json($schedules);
    }
}
