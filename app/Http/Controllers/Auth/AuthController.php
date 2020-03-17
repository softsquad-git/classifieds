<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActivateRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Users\UserResource;
use App\Repositories\Auth\AuthRepository;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @var AuthRepository
     * @var AuthService
     */
    private $service;
    private $repository;

    public function __construct(AuthRepository $repository, AuthService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['msg' => 'Successfully logout!']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'name' => Auth::user()->name

        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = $request->only(['name', 'last_name', 'email', 'password', 'birthday']);
        $userSpecific = $request->only(['sex', 'avatar_src', 'phone', 'city', 'address', 'post_code']);
        $item = $this->service->register($user, $userSpecific);

        return response()->json([
            'success' => 1,
            'user' => $item
        ]);
    }

    public function activate(ActivateRequest $request)
    {
        //
    }

    public function me()
    {
        return new UserResource($this->repository->find());
    }

}
