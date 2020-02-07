<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CleanerServiceProvider extends Model
{
    protected $table ='cleaner_service_provider';

    protected $fillable = [
        'cleaner_id',
        'service_provider_id',
    ];

    public function service_provider(){
        return $this->belongsTo('App\Models\ServiceProvider');
    }

    public function cleaner(){
        return $this->belongsTo('App\User', 'cleaner_id');
    }
}
