<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Auth\UseCase\Authenticate\AuthenticateRequest;
use Auth\UseCase\Authenticate\AuthenticateUseCaseInterface;
use Auth\UseCase\GenerateToken\GenerateTokenRequest;
use Auth\UseCase\GenerateToken\GenerateTokenUseCaseInterface;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    public function showForm(): View
    {
        return view('auth.login');
    }

    /**
     * @return array{before: string, after: string}
     */
    public function handle(
        LoginRequest $request,
        AuthenticateUseCaseInterface $authenticateInteractor,
        GenerateTokenUseCaseInterface $generateTokenInteractor,
    ): array {
        $before = $request->session()->getId();
        $email = $request->validated('email', '');
        assert(is_string($email));

        $authenticateResponse = $authenticateInteractor->handle(new AuthenticateRequest($email));

        $generateTokenResponse = $generateTokenInteractor->handle(
            new GenerateTokenRequest($authenticateResponse->sessionToken)
        );

        return [
            'before' => $before,
            'after' => $generateTokenResponse->token,
        ];
    }
}
