<?php

declare(strict_types=1);

namespace Auth\UseCase\GenerateToken;

/**
 * トークン生成ユースケース
 */
interface GenerateTokenUseCaseInterface
{
    public function handle(GenerateTokenRequest $request): GenerateTokenResponse;
}
