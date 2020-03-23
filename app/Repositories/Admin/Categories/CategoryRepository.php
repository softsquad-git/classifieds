<?php


namespace App\Repositories\Admin\Categories;


use App\Models\Categories\Category;

class CategoryRepository
{

    public function items()
    {
        $ids = [];
        $categories = Category::where('parent_id', 0)->get();
        foreach ($categories as $category) {
            array_push($ids, $category->id);
            foreach ($category->children as $child) {
                array_push($ids, $child->id);
            }
        }
        $categories = Category::whereIn('id', $ids)
            ->paginate(20);

        return $categories;
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
