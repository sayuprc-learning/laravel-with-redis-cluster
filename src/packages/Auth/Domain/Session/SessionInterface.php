<?php

declare(strict_types=1);

namespace Auth\Domain\Session;

interface SessionInterface
{
    /**
     * ユーザー ID をセッションに含めて再生成する
     */
    public function regenerate(int $id): void;

    /**
     * セッションの ID を取得する
     */
    public function getId(): string;
}
