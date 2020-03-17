<?php

namespace App\Services\Auth;

use App\Helpers\Status;
use App\Helpers\VerifyEmail;
use App\Models\Users\UserSpecific;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function register(array $user, array $userSpecific): User
    {
        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);
        $userSpecific['user_id'] = $user->id;
        UserSpecific::create($userSpecific);
        VerifyEmail::verify($user->id);

        return $user;
    }

    public function activate($key)
    {
        $v = VerifyEmail::checkKey($key);
        if ($v === false)
            return $v;

        $user = User::find(Auth::id());
        User::where('id', Auth::id())
            ->update([
                'activated' => 1,
                'status' => Status::USERS_ACTIVATED
            ]);
        $user->v()->delete();

        return $v;
    }

}
