<?php

declare(strict_types=1);

namespace Auth\Domain\User;

class User
{
    public function __construct(
        public readonly UserId $userId,
        public readonly Email $email
    ) {
    }
}
