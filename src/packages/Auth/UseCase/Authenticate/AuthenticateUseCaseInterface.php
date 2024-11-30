<?php

declare(strict_types=1);

namespace Auth\UseCase\Authenticate;

interface AuthenticateUseCaseInterface
{
    public function handle(AuthenticateRequest $request): AuthenticateResponse;
}
