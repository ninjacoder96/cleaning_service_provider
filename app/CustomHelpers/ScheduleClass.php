<?php 
namespace App\CustomHelpers;

header('Content-type:application/json;charset=utf-8');
use Illuminate\Http\Request;


class ScheduleClass{
    
 
    public static function validateSchedule($day,$schedule,$start_time_db,$end_time_db,$start_time_timestamp,$end_time_timestamp){
        $msg = array();

        $days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
        $start_time_format = date('h:i a',$start_time_timestamp);
        $end_time_format = date('h:i a', $end_time_timestamp);

        if($start_time_db == $start_time_timestamp && $end_time_db ==  $end_time_timestamp){
            $msg[] = array(
                "msg" => 'Existing Schedule for : ' . $schedule["service"]["name"] . '  On ' .  $days[$day - 1] . '<br> Start Time: '.     $start_time_format   . '<br> End Time :' .  $end_time_format,
                "code" => 500
            );
            echo json_encode($msg);
            exit();
        }elseif( ($start_time_db >= $start_time_timestamp && $start_time_db <= $end_time_timestamp) || ($start_time_db >= $start_time_timestamp && $end_time_db <= $end_time_timestamp )){
            $msg[] = array(
                "msg" => 'Overlapping Schedule for : ' . $schedule["service"]["name"] . '  On ' .  $days[$day - 1] . '<br> Start Time: '.  $start_time_format  . '<br> End Time :' .$end_time_format,
                "code" => 500
            );
            echo json_encode($msg);
            exit();
        }else{
            return true;
        }
    }


}




?>