<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'password', 'role_id', 'approved', 'active', 'username', 'is_active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isDeactivated()
    {
        return $this->is_deactivated == 1;
    }

    public function cleaner_service_provider(){
        return $this->hasOne('App\Models\CleanerServiceProvider', 'cleaner_id', 'id');
    }

    public function client_schedules(){
        return $this->hasMany('App\Models\CleanerSchedule', 'client_id', 'id');
    }

    public function cleaner_schedules(){
        return $this->hasMany('App\Models\CleanerSchedule', 'cleaner_id', 'id');
    }

    public function service_provider(){
        return $this->hasOne('App\Models\ServiceProvider', 'ownder_id', 'id');
    }

    public function schedule(){
        return $this->hasManyThrough('App\Models\Schedule', 'cleaner_id', 'id');
    }

    public function services(){
        return $this->belongsToMany('App\Models\Service', 'cleaner_service', 'cleaner_id', 'service_id');
    }

    public function profile(){
        return $this->hasOne('App\Models\UserProfile');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function cleaner_review(){
        return $this->hasMany('App\Models\CleanerReview', 'cleaner_id', 'id');
    }

    public function client_review(){
        return $this->hasMany('App\Models\CleanerReview', 'client_id', 'id');
    }

    public function company(){
        return $this->hasOne('App\Models\Company', 'owner_id', 'id');
    }

    public function send_message(){
        return $this->hasMany('App\Models\Message', 'sender_id', 'id');
    }

    public function receive_message(){
        return $this->hasMany('App\Models\Message', 'receiver_id', 'id');
    }

    public function notif_sender(){
        return $this->hasMany('App\Models\Notification', 'sender_id', 'id');
    }

    public function notif_receiver(){
        return $this->hasMany('App\Models\Notifications', 'receiver_id', 'id');
    }
}
