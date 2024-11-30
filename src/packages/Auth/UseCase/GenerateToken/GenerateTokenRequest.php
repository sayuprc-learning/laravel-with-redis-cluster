<?php

declare(strict_types=1);

namespace Auth\UseCase\GenerateToken;

/**
 * トークン生成ユースケースの入力値
 */
class GenerateTokenRequest
{
    public function __construct(public readonly string $sessionId)
    {
    }
}
