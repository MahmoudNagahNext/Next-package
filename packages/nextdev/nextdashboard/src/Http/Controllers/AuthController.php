<?php

namespace nextdev\nextdashboard\Http\Controllers;

use Illuminate\Routing\Controller;
use nextdev\nextdashboard\Traits\ApiResponseTrait;
use nextdev\nextdashboard\Http\Requests\Auth\LoginRequest;
use nextdev\nextdashboard\Http\Requests\Auth\RegisterRequest;
use nextdev\nextdashboard\Services\AuthService;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function __construct(
        protected AuthService $authService
    ){}

    public function login(LoginRequest $request)
    {
        try {
            $data = $this->authService->login($request->validated());

            return $this->successResponse([
                'user' => $data['user'],
                'token' => $data['token'],
                'token_type' => 'Bearer'
            ], 'Login successful');
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $res = $this->authService->register($request->validated());

            return $this->createdResponse([
                'user' => $res['user'],
                'token' => $res['token'],
                'token_type' => 'Bearer'
            ], 'User Created Successfully');
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }
}