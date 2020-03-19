<?php

namespace App\Repositories\Front\Classifieds;

use App\Helpers\Status;
use App\Models\Classifieds\Classifieds;

class ClassifiedsRepository
{

    public function items(array $search)
    {
        $title = $search['title'];
        $category = $search['category'];
        $location = $search['location'];
        $type = $search['type'];

        $items = Classifieds::where('status', Status::CLASSIFIEDS_PUBLISHED)
            ->orWhere('status', Status::CLASSIFIEDS_PROMO)
            ->orderBy('id', 'DESC');
        if (!empty($title))
            $items->where('title', 'like', '%' . $title . '%');
        if (!empty($category))
            $items->where('category_id', $category);
        if (!empty($location))
            $items->where('location', $location);
        if (!empty($type))
            $items->where('type', $type);

        return $items
            ->paginate(20);
    }

    public function find($id)
    {
        $item = Classifieds::find($id);

        return $item;
    }

}
