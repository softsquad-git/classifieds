<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoryRequest;
use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Classifieds\ClassifiedsResource;
use App\Repositories\Admin\Categories\CategoryRepository;
use App\Services\Admin\Categories\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     * @var CategoryRepository
     */
    private $service;
    private $repository;

    public function __construct(CategoryService $service, CategoryRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function items()
    {
        $items = $this->repository->items();

        return CategoryResource::collection($items);
    }

    public function store(CategoryRequest $request)
    {
        $item = $this->service->store($request->all());

        return response()->json([
            'success' => 1,
            'item' => $item
        ]);
    }


    public function update(CategoryRequest $request, $id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $this->service->update($request->all(), $item);

            return response()->json([
                'success' => 1,
                'item' => $item
            ]);
        }

        return response()->json([
            'success' => 0
        ]);
    }

    public function delete($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $this->service->delete($item);

            return response()->json([
                'success' => 1
            ]);
        }

        return response()->json([
            'success' => 0
        ]);
    }

    public function show($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            return ClassifiedsResource::collection($item->classifieds);
        }

        return response()->json([
            'success' => 0
        ]);
    }

    public function all(){
        return CategoryResource::collection($this->repository->all());
    }

}
