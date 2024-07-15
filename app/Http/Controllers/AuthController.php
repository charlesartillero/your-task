<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Service\TokenService;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        return new UserResource($user);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return $this->error('Invalid Credentials', Response::HTTP_UNAUTHORIZED);
        }

        $user = User::Where('email', $request->validated()['email'])->first();
        $token = TokenService::create($user, ["*"],  now()->addDay());

        $data = [
            'token' => $token,
            'user' => new UserResource($user)
        ];

        return $this->success('Login Successful', $data);

    }
}
