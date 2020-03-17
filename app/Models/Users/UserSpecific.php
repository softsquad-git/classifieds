<?php

namespace App\Models\Users;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserSpecific extends Model
{
    protected $table = 'users_specific_data';

    protected $fillable = [
        'user_id',
        'sex',
        'avatar_src',
        'phone',
        'city',
        'address',
        'post_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
