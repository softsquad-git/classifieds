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

    /*************
     *
     *
     * LIST CLASSIFIEDS
     *
     *
     ************/

    public function items(Request $request)
    {
        $search = [
            'category' => $request->input('category'),
            'title' => $request->input('title')
        ];

        $items = $this->repository->items($search);

        return ClassifiedsResource::collection($items);
    }

    public function itemsArchive(Request $request){
        $search = [
            'category' => $request->input('category'),
            'title' => $request->input('title')
        ];

        $items = $this->repository->itemsArchive($search);

        return ClassifiedsResource::collection($items);
    }

    public function itemsLocked(Request $request){
        $search = [
            'category' => $request->input('category'),
            'title' => $request->input('title')
        ];

        $items = $this->repository->itemsLocked($search);

        return ClassifiedsResource::collection($items);
    }


    public function itemsWaiting(Request $request){
        $search = [
            'category' => $request->input('category'),
            'title' => $request->input('title')
        ];

        $items = $this->repository->itemsWaiting($search);

        return ClassifiedsResource::collection($items);
    }

    public function itemsPromo(Request $request){
        $search = [
            'category' => $request->input('category'),
            'title' => $request->input('title')
        ];

        $items = $this->repository->itemsPromo($search);

        return ClassifiedsResource::collection($items);
    }

    /****************
     *
     *
     * END LIST CLASSIFIEDS
     *
     *
     ***************/

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

    public function archive($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item))
        {
            $this->service->archive($item);

            return response()->json([
                'success' => 1,
                'status' => $item->status
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
