<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockedUser extends Model
{
    protected $fillable = [
    	'blocker_id',
    	'blocked_id',
    	'reason',
    	'blocked',
    ];

    public function blocker(){
    	return $this->belongsTo('App\User', 'blocker_id');
    }

    public function blocked(){
    	return $this->belongsTo('App\User', 'blocked');
    }


}
