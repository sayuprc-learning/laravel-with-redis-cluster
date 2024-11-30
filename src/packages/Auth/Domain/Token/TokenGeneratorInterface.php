<?php

declare(strict_types=1);

namespace Auth\Domain\Token;

interface TokenGeneratorInterface
{
    /**
     * 入力値をもとにトークンを生成する
     */
    public function generate(string $value): string;
}
