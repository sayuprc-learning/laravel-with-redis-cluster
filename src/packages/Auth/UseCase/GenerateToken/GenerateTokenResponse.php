<?php

declare(strict_types=1);

namespace Auth\UseCase\GenerateToken;

class GenerateTokenResponse
{
    public function __construct(public readonly string $token)
    {
    }
}
