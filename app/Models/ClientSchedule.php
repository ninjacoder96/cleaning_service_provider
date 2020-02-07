<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientSchedule extends Model
{

    protected $fillable = [
        'client_id',
        'schedule_id',
        'status',
        'landmark_address',
        'time_in',
        'time_out',
        'rating',
        'feedback',
        'rating_client',
        'feedback_client',
    ];

    public function schedule(){
    	return $this->belongsTo('App\Models\Schedule');
    }
}
