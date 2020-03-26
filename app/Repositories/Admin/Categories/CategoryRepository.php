<?php

namespace App\Repositories\Admin\Categories;

use App\Models\Categories\Category;

class CategoryRepository
{

    public function items()
    {
        return Category::orderBy('id', 'ASC')
            ->paginate(20);
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function all()
    {
        return Category::all();
    }

}
