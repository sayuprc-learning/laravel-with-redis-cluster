<?php

declare(strict_types=1);

namespace Auth\Infrastructure\Session;

use Auth\Domain\Session\SessionInterface;
use Illuminate\Contracts\Session\Session as SessionContract;

class Session implements SessionInterface
{
    public function __construct(private readonly SessionContract $session)
    {
    }

    public function getId(): string
    {
        return $this->session->getId();
    }

    public function regenerate(int $id): void
    {
        $this->session->regenerate(true);
        $this->session->put('login', $id);
        $this->session->migrate(true);
    }
}
