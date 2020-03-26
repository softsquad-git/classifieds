<?php

namespace App\Repositories\Admin\Classifieds;

use App\Models\Classifieds\Classifieds;

class ClassifiedsRepository
{

    public function items($search)
    {
        $user_id = $search['user_id'];
        $items = Classifieds::orderBy('id', 'DESC');

        if (!empty($user_id))
            $items->where('user_id', $user_id);

        return $items
            ->paginate(20);
    }


    public function find($id)
    {
        return Classifieds::find($id);
    }
}
