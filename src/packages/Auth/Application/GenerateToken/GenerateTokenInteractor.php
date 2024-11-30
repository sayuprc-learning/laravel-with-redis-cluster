<?php

declare(strict_types=1);

namespace Auth\Application\GenerateToken;

use Auth\Domain\Token\TokenGeneratorInterface;
use Auth\UseCase\GenerateToken\GenerateTokenRequest;
use Auth\UseCase\GenerateToken\GenerateTokenResponse;
use Auth\UseCase\GenerateToken\GenerateTokenUseCaseInterface;

class GenerateTokenInteractor implements GenerateTokenUseCaseInterface
{
    public function __construct(private readonly TokenGeneratorInterface $tokenGenerator)
    {
    }

    /**
     * 渡されたセッション ID からトークンを生成する
     */
    public function handle(GenerateTokenRequest $request): GenerateTokenResponse
    {
        return new GenerateTokenResponse($this->tokenGenerator->generate($request->sessionId));
    }
}
