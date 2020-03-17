<?php

namespace App\Repositories\Users\Classifieds;

use App\Models\Classifieds\Classifieds;

class ClassifiedsRepository
{

    public function items($search)
    {
        $category = $search['category'];
        $title = $search['title'];
        $items = Classifieds::orderBy('id', 'DESC');

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
