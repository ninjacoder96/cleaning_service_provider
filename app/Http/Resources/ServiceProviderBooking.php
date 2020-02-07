<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ServiceProviderBooking extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'service_id' => $this->service_id,
            'service_name' => $this->service_name, 
            'cleaner_firstname' => $this->cleaner_firstname, 
            'cleaner_middlename' => $this->cleaner_middlename, 
            'cleaner_lastname' => $this->cleaner_lastname,
            'client_firstname' => $this->client_firstname,
            'client_middlename' => $this->client_middlename, 
            'client_lastname' => $this->client_lastname, 
            'start_time' => $this->start_time, 
            'end_time' => $this->end_time,
            'formated_start_time' => Carbon::createFromFormat('H:i:s',$this->start_time)->format('g:i A'),
            'formated_end_time' => Carbon::createFromFormat('H:i:s',$this->end_time)->format('g:i A'),
            'rating' => $this->rating,
            'feedback' => $this->feedback,
            'day_desc' => $this->day_desc,
            'day_id' => $this->day_id,
        ];

    }
}
