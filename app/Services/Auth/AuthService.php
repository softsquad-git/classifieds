<?php

namespace App\Services\Auth;

use App\Models\Users\UserSpecific;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function register(array $user, array $userSpecific): User
    {
        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);
        $userSpecific['user_id'] = $user->id;
        UserSpecific::create($userSpecific);

        return $user;
    }

}
