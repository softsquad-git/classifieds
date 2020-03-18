<?php

namespace App\Repositories\Users\Classifieds;

use App\Helpers\Status;
use App\Models\Classifieds\Classifieds;

class ClassifiedsRepository
{

    public function items($search)
    {
        $category = $search['category'];
        $title = $search['title'];
        $items = Classifieds::where('status', Status::CLASSIFIEDS_PUBLISHED)
        ->orderBy('id', 'DESC');

        if (!empty($category))
            $items->where('category_id', $category);
        if (!empty($title))
            $items->where('title', 'like', '%' . $title . '%');

        return $items
            ->paginate(20);
    }

    public function itemsArchive($search)
    {
        $category = $search['category'];
        $title = $search['title'];
        $items = Classifieds::where('status', Status::CLASSIFIEDS_ARCHIVE)
            ->orderBy('id', 'DESC');
        if (!empty($category))
            $items->where('category_id', $category);
        if (!empty($title))
            $items->where('title', 'like', '%' . $title . '%');

        return $items
            ->paginate(20);
    }

    public function itemsWaiting($search)
    {
        $category = $search['category'];
        $title = $search['title'];
        $items = Classifieds::where('status', Status::CLASSIFIEDS_NEW)
            ->orderBy('id', 'DESC');
        if (!empty($category))
            $items->where('category_id', $category);
        if (!empty($title))
            $items->where('title', 'like', '%' . $title . '%');

        return $items
            ->paginate(20);
    }

    public function itemsLocked($search){
        $category = $search['category'];
        $title = $search['title'];
        $items = Classifieds::where('status', Status::CLASSIFIEDS_LOCKED)
            ->orderBy('id', 'DESC');
        if (!empty($category))
            $items->where('category_id', $category);
        if (!empty($title))
            $items->where('title', 'like', '%' . $title . '%');

        return $items
            ->paginate(20);
    }

    public function itemsPromo($search){
        $category = $search['category'];
        $title = $search['title'];
        $items = Classifieds::where('status', Status::CLASSIFIEDS_PROMO)
            ->orderBy('id', 'DESC');
        if (!empty($category))
            $items->where('category_id', $category);
        if (!empty($title))
            $items->where('title', 'like', '%' . $title . '%');

        return $items
            ->paginate(20);
    }

    public function find($id)
    {
        return Classifieds::find($id);
    }

}
