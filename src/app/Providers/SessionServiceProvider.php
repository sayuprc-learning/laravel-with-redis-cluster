<?php

declare(strict_types=1);

namespace App\Providers;

use Auth\Domain\Session\SessionInterface;
use Auth\Infrastructure\CustomRedisSession;
use Auth\Infrastructure\Session\Session;
use Illuminate\Foundation\Application;
use Illuminate\Redis\RedisManager;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\ServiceProvider;
use RedisCluster;

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SessionInterface::class, Session::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        FacadesSession::extend(
            'custom-redis',
            function (Application $application) {
                $redisManager = $application->make(RedisManager::class);
                assert($redisManager instanceof RedisManager);

                $redisCluster = $redisManager->connection()->client();
                assert($redisCluster instanceof RedisCluster);

                return new CustomRedisSession($redisCluster);
            }
        );
    }
}
