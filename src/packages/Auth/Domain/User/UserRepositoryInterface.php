<?php

declare(strict_types=1);

namespace Auth\Domain\User;

interface UserRepositoryInterface
{
    /**
     * メールアドレスからユーザーを取得する
     */
    public function findByEmail(Email $email): ?User;
}
