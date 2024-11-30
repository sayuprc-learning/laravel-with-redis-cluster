<?php

declare(strict_types=1);

namespace Auth\Domain\Session;

interface SessionInterface
{
    public function regenerate(int $id): void;

    public function getId(): string;
}
