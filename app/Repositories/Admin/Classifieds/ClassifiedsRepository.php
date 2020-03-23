<?php

namespace App\Repositories\Admin\Classifieds;

use App\Models\Classifieds\Classifieds;

class ClassifiedsRepository
{

    public function items($status)
    {
        $items = Classifieds::orderBy('id', 'DESC');
        if (!empty($status))
            $items->where('status', $status);

        return $items
            ->paginate(20);
    }


    public function find($id)
    {
        return Classifieds::find($id);
    }
}
