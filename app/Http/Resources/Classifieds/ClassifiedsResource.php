<?php

namespace App\Http\Resources\Classifieds;

use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Users\UserResource;
use App\User;
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
        $data = parent::toArray($request);
        $data['image'] = $this->getImageList();
        $data['images']= ClassifiedsImagesResource::collection($this->images);
        $data['user'] = new UserResource(User::find($this->user_id));
        $data['category'] = new CategoryResource($this->category);

        return $data;
    }
}
