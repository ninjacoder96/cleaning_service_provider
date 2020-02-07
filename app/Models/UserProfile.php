<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserProfile extends Model
{
    protected $fillable = [
    	'user_id',
    	'firstname',
    	'lastname',
    	'middlename',
    	'mobile_number',
    	'address',
    	'date_of_birth',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
	}
	
	public function getAgeAttribute()
{
    return Carbon::parse($this->attributes['date_of_birth'])->age;
}
}
