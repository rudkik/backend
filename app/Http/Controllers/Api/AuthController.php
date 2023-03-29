<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterStepOne;
use App\Http\Requests\RegisterStepTwo;
use App\Http\Requests\RegisterStepThreeIndividual;
use App\Http\Requests\RegisterStepThreeCompany;
use App\Http\Requests\RegisterStepFour;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;


class AuthController extends Controller
{
    protected AuthService $authService;

    /**
     * Instantiate a new controller instance.
     *
     * @param AuthService $authService
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginFormRequest $request): JsonResponse
    {
        return $this->authService->login($request->all());
    }

    public function refreshToken(): JsonResponse
    {
        return response()->json([
            'refresh_token' => auth('api')->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => new UserResource(auth('api')->user()),
        ]);
    }


    //Step 1
    public function sendCode(RegisterStepOne $request): JsonResponse
    {
        return $this->authService->sendCode($request->all());
    }

    //Step 2
    public function confirmCode(RegisterStepTwo $request): JsonResponse
    {
        return $this->authService->confirmCode($request->all());

    }

    //Step 3
    public function infoIndividual(RegisterStepThreeIndividual $request): JsonResponse
    {
        return $this->authService->infoIndividual($request->all());
    }

    public function infoCompany(RegisterStepThreeCompany $request): JsonResponse
    {
        return $this->authService->infoCompany($request->all());
    }

    //Step 4
    public function register(RegisterStepFour $request): JsonResponse
    {
        return $this->authService->register($request->all());
    }


    /**
     * Get the authenticated User.
     *
     * @return UserResource
     */
    public function profile(): UserResource
    {
        $user = auth('api')->user();
        return new UserResource($user);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('api')->logout();

        return response()->json(['message' => 'Выход выполнен']);
    }
}
