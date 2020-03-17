<?php

namespace App\Repositories\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{

    public function find(){
        return User::find(Auth::id());
    }

}
