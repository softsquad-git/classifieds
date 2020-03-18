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
            'user_id' => $this->user_id,
            'ad_id' => $this->classified_id,
            'path' => asset('assets/data/classifieds/' . $this->path),
            'extension' => $this->extension
        ];
    }
}
