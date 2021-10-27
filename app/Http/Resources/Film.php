<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Film extends JsonResource
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
            'title' => $this->title,
            'author' => $this->author,
            'year' => $this->year,
          ];
    }
}
