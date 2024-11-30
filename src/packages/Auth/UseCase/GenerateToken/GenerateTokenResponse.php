<?php

declare(strict_types=1);

namespace Auth\UseCase\GenerateToken;

/**
 * トークン生成ユースケースの返却値
 */
class GenerateTokenResponse
{
    public function __construct(public readonly string $token)
    {
    }
}
