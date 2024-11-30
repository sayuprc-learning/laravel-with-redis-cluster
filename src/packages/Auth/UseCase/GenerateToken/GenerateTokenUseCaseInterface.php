<?php

declare(strict_types=1);

namespace Auth\UseCase\GenerateToken;

interface GenerateTokenUseCaseInterface
{
    public function handle(GenerateTokenRequest $request): GenerateTokenResponse;
}
