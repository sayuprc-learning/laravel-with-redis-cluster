<?php

declare(strict_types=1);

namespace Auth\Domain\Token;

interface TokenGeneratorInterface
{
    public function generate(string $value): string;
}
