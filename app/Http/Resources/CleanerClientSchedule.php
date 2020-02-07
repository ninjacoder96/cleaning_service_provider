<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CleanerClientSchedule extends JsonResource
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
            'id' => $this->id,
            'servie_id' => $this->service_id,
            'service_name' => $this->service_name,
            'service_desc' => $this->service_desc,
            'client_id' => $this->client_id,
            'client_firstname' => $this->client_firstname,
            'client_middlename' => $this->client_middlename,
            'client_lastname' => $this->client_lastname,
            'day_desc' => $this->day_desc,
            'rating' => $this->rating,
            'feedback' => $this->feedback,
            'formated_start_time' => Carbon::createFromFormat('H:i:s',$this->start_time)->format('g:i A'),
            'formated_end_time' => Carbon::createFromFormat('H:i:s',$this->end_time)->format('g:i A'),
            'time_in' => $this->time_in != null ? Carbon::createFromFormat('H:i:s',$this->time_in)->format('g:i A') : null,
            'time_out' => $this->time_out != null ? Carbon::createFromFormat('H:i:s',$this->time_out)->format('g:i A') : null,
            'status' => $this->status,
        ];
    }
}
