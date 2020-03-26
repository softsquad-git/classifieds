<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UserRequest;
use App\Http\Resources\Users\UserResource;
use App\Repositories\Admin\Users\UserRepository;
use App\Services\Admin\Users\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService;
     * @var UserRepository;
     */
    private $service;
    private $repository;

    public function __construct(UserService $service, UserRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function items(){
        $items = $this->repository->items();

        return UserResource::collection($items);
    }

    public function update(UserRequest $request, $id){
        $item = $this->repository->find($id);
        if (!empty($item)){
            $dataUser = $request->only([
                'name',
                'last_name',
                'email',
                'birthday'
            ]);
            $dataSpecificUser = $request->only([
                'sex',
                'phone',
                'city',
                'address',
                'post_code'
            ]);
            $item = $this->service->update($dataUser, $dataSpecificUser, $item);

            return response()->json([
                'success' => 1,
                'item' => $item
            ]);
        }

        return response()->json([
            'success' => 0
        ]);
    }

    public function item($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)){
            return new UserResource($item);
        }

        return response()->json([
            'success' => 0
        ]);
    }
}
