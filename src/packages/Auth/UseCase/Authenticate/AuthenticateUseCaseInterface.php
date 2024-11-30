<?php

declare(strict_types=1);

namespace Auth\UseCase\Authenticate;

/**
 * 認証ユースケース
 */
interface AuthenticateUseCaseInterface
{
    public function handle(AuthenticateRequest $request): AuthenticateResponse;
}
