<?php

namespace App\Http\Resources\Users;

use App\Helpers\Avatar;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserResource extends JsonResource
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
        $data['s'] = $this->s;
        $data['s']['avatar_src'] = asset(Avatar::getAvatar(Auth::id()));

        return $data;
    }
}
