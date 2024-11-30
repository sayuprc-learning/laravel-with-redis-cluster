<?php

declare(strict_types=1);

namespace App\Providers;

use Auth\Application\Authenticate\AuthenticateInteractor;
use Auth\Application\GenerateToken\GenerateTokenInteractor;
use Auth\DebugInfrastructure\User\DebugUserRepository;
use Auth\Domain\Token\TokenGeneratorInterface;
use Auth\Domain\User\UserRepositoryInterface;
use Auth\Infrastructure\Token\TokenGenerator;
use Auth\UseCase\Authenticate\AuthenticateUseCaseInterface;
use Auth\UseCase\GenerateToken\GenerateTokenUseCaseInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticateUseCaseInterface::class, AuthenticateInteractor::class);
        $this->app->bind(GenerateTokenUseCaseInterface::class, GenerateTokenInteractor::class);
        $this->app->bind(TokenGeneratorInterface::class, TokenGenerator::class);
        $this->app->bind(UserRepositoryInterface::class, DebugUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
