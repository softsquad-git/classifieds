<?php

namespace App;

use App\Models\Classifieds\Classifieds;
use App\Models\Classifieds\ClassifiedsImages;
use App\Models\Users\UserSpecific;
use App\Models\Verify\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'birthday'
    ];

    protected $hidden = [
        'password',
    ];

    public function s()
    {
        return $this->hasOne(UserSpecific::class, 'user_id', 'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'id' => $this->id,
            'fullname' => $this->name ?? '' . ' ' . $this->last_name ?? '',
            'email' => $this->email
        ];
    }

    public function classifieds()
    {
        return $this->hasMany(Classifieds::class, 'user_id', 'id');
    }

    public function classifiedsImages()
    {
        return $this->hasMany(ClassifiedsImages::class, 'user_id', 'id');
    }

    public function v()
    {
        return $this->hasOne(VerifyEmail::class, 'user_id', 'id');
    }

}
