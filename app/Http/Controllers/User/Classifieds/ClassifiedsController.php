<?php

namespace App\Http\Controllers\User\Classifieds;

use App\Http\Controllers\Controller;
use App\Http\Requests\Classifieds\ClassifiedsRequest;
use App\Http\Resources\Classifieds\ClassifiedsResource;
use App\Repositories\Users\Classifieds\ClassifiedsRepository;
use App\Services\Users\Classifieds\ClassifiedsService;
use Illuminate\Http\Request;

class ClassifiedsController extends Controller
{
    /**
     * @var ClassifiedsRepository
     * @var ClassifiedsService
     */
    private $service;
    private $repository;

    public function __construct(ClassifiedsService $service, ClassifiedsRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function items(Request $request)
    {
        $search = [
            'category' => $request->input('category'),
            'title' => $request->input('title')
        ];

        $items = $this->repository->items($search);

        return ClassifiedsResource::collection($items);
    }

    public function item($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item))
            return new ClassifiedsResource($item);

        return response()->json([
            'success' => 0
        ]);
    }

    public function store(ClassifiedsRequest $request)
    {
        $item = $this->service->store($request->all());
        if ($request->hasFile('images'))
            $this->service->uploadImages($request->images, $item->id);

        return response()->json([
            'success' => 1,
            'item' => $item
        ]);
    }

    public function update(ClassifiedsRequest $request, $id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $item = $this->service->update($request->all(), $item);
            if ($request->hasFile('images'))
                $this->service->uploadImages($request->images, $item->id);

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
}
