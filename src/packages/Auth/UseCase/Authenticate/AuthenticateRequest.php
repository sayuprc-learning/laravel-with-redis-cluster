<?php

declare(strict_types=1);

namespace Auth\UseCase\Authenticate;

/**
 * 認証ユースケースの入力値
 */
class AuthenticateRequest
{
    public function __construct(public readonly string $email)
    {
    }
}
