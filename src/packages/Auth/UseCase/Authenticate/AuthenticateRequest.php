<?php

declare(strict_types=1);

namespace Auth\UseCase\Authenticate;

class AuthenticateRequest
{
    public function __construct(public readonly string $email)
    {
    }
}
