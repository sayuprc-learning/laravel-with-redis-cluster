<?php

declare(strict_types=1);

namespace Auth\UseCase\Authenticate;

class AuthenticateResponse
{
    public function __construct(public readonly string $sessionToken)
    {
    }
}
