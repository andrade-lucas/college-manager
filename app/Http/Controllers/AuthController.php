<?php

namespace App\Http\Controllers;

use App\DTOs\User\RegisterUserDTO;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $registerUser = new RegisterUserDTO(
            $request->name,
            $request->email,
            $request->password,
            $request->birthdate
                ? Carbon::createFromFormat('Y-m-d', $request->birthdate)->toDate()
                : null
        );

        $this->userService->register($registerUser);

        return new JsonResponse([
            'message' => 'User created with success!'
        ], 201);
    }
}
