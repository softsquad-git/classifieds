<?php

namespace App\Http\Controllers\Front\Classifieds;

use App\Http\Controllers\Controller;
use App\Http\Resources\Classifieds\ClassifiedsResource;
use App\Repositories\Front\Classifieds\ClassifiedsRepository;
use App\Services\Front\Classifieds\ClassifiedsService;
use Illuminate\Http\Request;

class ClassifiedsController extends Controller
{
    /**
     * @var ClassifiedsService
     * @var ClassifiedsRepository
     */
    private $service;
    private $repository;

    public function __construct(ClassifiedsRepository $repository, ClassifiedsService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function items(Request $request)
    {
        $search = [
            'category' => $request->category,
            'title' => $request->title,
            'type' => $request->type,
            'location' => $request->location
        ];
        $items = $this->repository->items($search);

        return ClassifiedsResource::collection($items);
    }

    public function item($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $this->service->view($item);
            return new ClassifiedsResource($item);
        }

        return response()->json([
            'success' => 0
        ]);
    }
}
