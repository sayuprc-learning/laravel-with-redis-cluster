<?php

declare(strict_types=1);

namespace Auth\Application\Authenticate;

use Auth\Domain\Session\SessionInterface;
use Auth\Domain\User\Email;
use Auth\Domain\User\UserRepositoryInterface;
use Auth\UseCase\Authenticate\AuthenticateRequest;
use Auth\UseCase\Authenticate\AuthenticateResponse;
use Auth\UseCase\Authenticate\AuthenticateUseCaseInterface;
use Shared\Exceptions\DomainNotFoundException;

class AuthenticateInteractor implements AuthenticateUseCaseInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly SessionInterface $session,
    ) {
    }

    /**
     * メールアドレスからユーザーを取得しセッションを再生成する
     * 再生成したセッション ID を返す
     *
     * @throws DomainNotFoundException
     */
    public function handle(AuthenticateRequest $request): AuthenticateResponse
    {
        $found = $this->userRepository->findByEmail(new Email($request->email)) ?? throw new DomainNotFoundException();

        $this->session->regenerate($found->userId->getValue());

        return new AuthenticateResponse($this->session->getId());
    }
}
