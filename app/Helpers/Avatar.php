<?php


namespace App\Helpers;


use App\User;

class Avatar
{
    public static function getAvatar($userID)
    {
        $user = User::find($userID);
        if (!empty($user)) {
            $avatar = $user->s->avatar_src;
            $sex = $user->s->sex;
            if (!empty($avatar)) {
                return config('app.df.src.avatar') . $avatar;
            } else {
                if (!empty($sex)) {
                    if ($sex == 'WOMAN')
                        return config('app.df.src.avatar') . 'df-woman.jpg';
                    else
                        return config('app.df.src.avatar') . 'df-man.jpg';
                } else
                    return config('app.df.src.avatar') . 'df.jpg';
            }
        } else
            return config('app.df.src.avatar') . 'df.jpg';
    }

}
