<?php

declare(strict_types=1);

namespace Auth\UseCase\Authenticate;

/**
 * 認証ユースケースの返却値
 */
class AuthenticateResponse
{
    public function __construct(public readonly string $sessionToken)
    {
    }
}
