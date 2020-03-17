<?php

namespace App\Http\Resources\Classifieds;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassifiedsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
