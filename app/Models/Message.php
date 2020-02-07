<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\MessageCreated;
use App\Events\MessageUpdated;

class Message extends Model
{
    protected $fillable = [
        'sender_id', 'receiver_id', 'viewed', 'text_message'
    ];

    protected $dispatchesEvents = [
        'created' => MessageCreated::class,
        'updated' => MessageUpdated::class,
    ];

    public function sender(){
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function receiver(){
        return $this->belongsTo('App\User', 'receiver_id');
    }
}
