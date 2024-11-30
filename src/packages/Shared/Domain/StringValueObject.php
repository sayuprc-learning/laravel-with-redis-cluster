<?php

declare(strict_types=1);

namespace Shared\Domain;

abstract class StringValueObject
{
    public function __construct(private readonly string $value)
    {
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
