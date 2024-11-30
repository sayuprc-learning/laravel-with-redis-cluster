<?php

declare(strict_types=1);

namespace Auth\Infrastructure;

use RedisCluster;
use SessionHandlerInterface;

/**
 * Laravel のカスタムセッションハンドラー
 */
class CustomRedisSession implements SessionHandlerInterface
{
    public function __construct(
        private readonly RedisCluster $redisCluster
    ) {
    }

    public function open(string $path, string $name): bool
    {
        return true;
    }

    public function close(): bool
    {
        return true;
    }

    public function read(string $id): false|string
    {
        $result = $this->redisCluster->get($this->getKey($id));

        return $result === false ? '' : $result;
    }

    public function write(string $id, string $data): bool
    {
        // トランザクションを張っている
        // トランザクションを利用している場合、保存先のノードが固定化されるので Cluster の恩恵を受けれない
        // トランザクションをとるか、分散性をとるかは各要件に応じて検討する
        $this->redisCluster->multi();
        $this->redisCluster->setex($this->getKey($id), 360, $data);
        $this->redisCluster->sAdd('tag:{session}', $id);
        $this->redisCluster->exec();

        return true;
    }

    public function destroy(string $id): bool
    {
        // トランザクションを張っている
        // トランザクションを利用している場合、保存先のノードが固定化されるので Cluster の恩恵を受けれない
        // トランザクションをとるか、分散性をとるかは各要件に応じて検討する
        $this->redisCluster->multi();
        $this->redisCluster->del($this->getKey($id));
        $this->redisCluster->sRem('tag:{session}', $id);
        $this->redisCluster->exec();

        return true;
    }

    public function gc(int $max_lifetime): false|int
    {
        return 0;
    }

    private function getKey(string $id): string
    {
        return 'tag:{session}:' . $id;
    }
}
