<?php

declare(strict_types=1);

namespace Auth\Infrastructure\User;

use Auth\Domain\User\Email;
use Auth\Domain\User\User;
use Auth\Domain\User\UserId;
use Auth\Domain\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(Email $email): ?User
    {
        $found = \App\Models\User::query()->where('email', $email)->first();

        if (is_null($found)) {
            return null;
        }

        return new User(new UserId($found->id), new Email($found->email));
    }
}
