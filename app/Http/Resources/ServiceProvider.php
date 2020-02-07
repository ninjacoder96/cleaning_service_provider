<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Service as ServiceResource;

class ServiceProvider extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'owner' => $this->owner->profile->firstname.' '.$this->owner->profile->middlename.' '.$this->owner->profile->lastname,
            'business_permit_no' => $this->business_permit_no,
            'contact_no' => $this->mobile_number,
            'contact_person' => $this->contact_person,
            'permit_img' => $this->permit_img,
            'company_img' => $this->company_img,
            'services' => ServiceResource::collection($this->services),
        ];
    }
}
