<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Actor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // to return specific/allowed fields
        return [
            'id' => $this->id,
            'film_id' => $this->film_id,
            'name' => $this->name,
          ];

    }
}
