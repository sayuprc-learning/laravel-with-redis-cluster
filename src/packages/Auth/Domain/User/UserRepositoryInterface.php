<?php

declare(strict_types=1);

namespace Auth\Domain\User;

interface UserRepositoryInterface
{
    public function findByEmail(Email $email): ?User;
}
