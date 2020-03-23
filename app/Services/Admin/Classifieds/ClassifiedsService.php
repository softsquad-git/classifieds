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

    public function lock(array $data, Classifieds $item): ClassifiedsLock
    {
        $data['classified_id'] = $item->id;
        $data['user_id'] = $item->user_id;
        $item = ClassifiedsLock::create($data);

        return $item;
    }

}
