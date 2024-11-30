<?php

declare(strict_types=1);

namespace Auth\DebugInfrastructure\User;

use Auth\Domain\User\Email;
use Auth\Domain\User\User;
use Auth\Domain\User\UserId;
use Auth\Domain\User\UserRepositoryInterface;

class DebugUserRepository implements UserRepositoryInterface
{
    public function findByEmail(Email $email): ?User
    {
        return new User(new UserId(1), $email);
    }
}
