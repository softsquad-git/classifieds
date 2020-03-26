<?php

namespace App\Http\Controllers\Admin\Classifieds;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Classifieds\SetStatusClassifiedRequest;
use App\Http\Requests\Classifieds\ClassifiedsLockRequest;
use App\Http\Resources\Classifieds\ClassifiedsResource;
use App\Repositories\Admin\Classifieds\ClassifiedsRepository;
use App\Services\Admin\Classifieds\ClassifiedsService;
use Illuminate\Http\Request;

class ClassifiedsController extends Controller
{
    /**
     * @var ClassifiedsRepository
     * @var ClassifiedsService
     */
    private $repository;
    private $service;

    public function __construct(ClassifiedsService $service, ClassifiedsRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function items(Request $request)
    {
        $search = [
            'user_id' => $request->user_id
        ];
        $items = $this->repository->items($search);

        return ClassifiedsResource::collection($items);
    }

    public function setStatus(SetStatusClassifiedRequest $request, $id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $item = $this->service->setStatus($request->all(), $item);

            return response()->json([
                'success' => 1,
                'item' => $item
            ]);
        }

        return response()->json([
            'success' => 0
        ]);
    }
}
