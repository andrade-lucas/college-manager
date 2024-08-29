<?php

namespace App\Services;

use App\DTOs\User\RegisterUserDTO;
use App\Models\User;
use App\Services\Mail\EmailInterface;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UserService
{
    public function __construct(private readonly EmailInterface $emailService)
    {
    }

    public function register(RegisterUserDTO $user): void
    {
        $userWithEmail = User::query()
            ->where('email', $user->email)
            ->first();

        if (! empty($userWithEmail)) {
            throw new BadRequestException('email already exists');
        }

        User::query()->create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'birthdate' => $user->birthdate
        ])->save();

        $this->emailService->send(
            env('MAIL_FROM_ADDRESS'), 
            $user->email, 
            'Welcome', 
            'Welcome to our site'
        );
    }
}
