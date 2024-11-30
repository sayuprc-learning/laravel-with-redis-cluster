<?php

declare(strict_types=1);

namespace Auth\UseCase\GenerateToken;

class GenerateTokenRequest
{
    public function __construct(public readonly string $sessionToken)
    {
    }
}
