<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CongregationResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'church_id' => $this->church_id
        ];
    }
}
