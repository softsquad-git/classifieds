<?php


namespace App\Services\Admin\Users;


use App\User;

class UserService
{

    public function update(array $dataUser, array $dataSpecificUser, User $item): User
    {
        $item->update($dataUser);
        $item->s()->update($dataSpecificUser);

        return $item;
    }

}
