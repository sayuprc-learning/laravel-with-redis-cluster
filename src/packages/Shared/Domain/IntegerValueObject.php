<?php

declare(strict_types=1);

namespace Shared\Domain;

/**
 * int 型の ValueObject
 */
abstract class IntegerValueObject
{
    public function __construct(private readonly int $value)
    {
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
