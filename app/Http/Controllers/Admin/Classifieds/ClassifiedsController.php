<?php

namespace App\Http\Controllers\Admin\Classifieds;

use App\Http\Controllers\Controller;
use App\Http\Requests\Classifieds\ClassifiedsLockRequest;
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
        $items = $this->repository->items($request->input('status'));

        return view('admin.classifieds.list', [
            'data' => $items,
            'status' => $request->input('status') ?? null
        ]);
    }

    public function accept($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $this->service->accept($item);

            return response()->json([
                'success' => 1
            ]);
        }

        return response()->json([
            'success' => 0
        ]);
    }

    public function lock(ClassifiedsLockRequest $request, $id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $this->service->lock($request->all(), $item);

            return response()->json([
                'success' => 1
            ]);
        }

        return response()->json([
            'success' => 0
        ]);
    }
}
