<?php

namespace App\DTOs\User;

use DateTime;

class RegisterUserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly ?DateTime $birthdate = null
    )
    {
    }
}
