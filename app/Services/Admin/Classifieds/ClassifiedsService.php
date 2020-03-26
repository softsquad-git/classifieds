<?php

namespace App\Services\Admin\Classifieds;

use App\Helpers\Status;
use App\Models\Classifieds\Classifieds;
use App\Models\Classifieds\ClassifiedsLock;

class ClassifiedsService
{

    public function accept(Classifieds $item): Classifieds
    {
        $item->update([
            'status' => Status::CLASSIFIEDS_PUBLISHED
        ]);

        return $item;
    }

    public function setStatus(array $data, Classifieds $item): Classifieds
    {
        $item->update($data);

        return $item;
    }

}
