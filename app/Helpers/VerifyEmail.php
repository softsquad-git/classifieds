<?php


namespace App\Helpers;


use App\Mail\Mails\Verify\VerifyEmailMail;
use App\User;
use Illuminate\Support\Facades\Mail;

class VerifyEmail
{

    public static function generateKey(){
        return substr(md5(time().date('Y-m-d H:i:s')), 15, 15);
    }

    public static function verify($user_id)
    {
        $user = User::find($user_id);
        if (empty($user))
            return false;

        $dataVerify = [];
        $dataVerify['user_id'] = $user_id;
        $dataVerify['_key'] = self::generateKey();

        $v = \App\Models\Verify\VerifyEmail::create($dataVerify);

        $user->_key = $dataVerify['_key'];

        Mail::to($user->email)->send(new VerifyEmailMail($user));

        return $v;
    }

}
