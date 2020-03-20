<?php

namespace App\Http\Controllers\Front\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Classifieds\ClassifiedsResource;
use App\Repositories\Admin\Categories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function items()
    {
        $items = $this->repository->all();

        return CategoryResource::collection($items);
    }

    public function item($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            return ClassifiedsResource::collection($item->classifieds);
        }

        return response()->json([
            'success' => 0
        ]);
    }
}
