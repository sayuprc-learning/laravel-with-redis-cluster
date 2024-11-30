<?php

declare(strict_types=1);

namespace Auth\Infrastructure\Token;

use Auth\Domain\Token\TokenGeneratorInterface;

class TokenGenerator implements TokenGeneratorInterface
{
    public function generate(string $value): string
    {
        return 'generated-' . $value;
    }
}
