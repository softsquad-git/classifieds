<?php

namespace App\Http\Resources\Classifieds;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassifiedsImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'path' => asset('assets/data/classifieds/' . $this->path),
        ];
    }
}
