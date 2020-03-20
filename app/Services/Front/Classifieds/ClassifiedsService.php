<?php

namespace App\Services\Front\Classifieds;

use App\Models\Classifieds\Classifieds;

class ClassifiedsService
{

    public function view(Classifieds $item): Classifieds
    {
        $item->update(['views' => $item->views + 1]);
        return $item;
    }

}
