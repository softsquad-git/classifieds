<?php


namespace App\Repositories\Admin\Users;


use App\User;

class UserRepository
{

    public function items(){
        $items = User::orderBy('id', 'DESC');

        return $items
            ->paginate(20);
    }

    public function find($id){
        return User::find($id);
    }

}
