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
    /**
     * ログインフォームを表示する
     */
    public function showForm(): View
    {
        return view('auth.login');
    }

    /**
     * メールアドレスでユーザーを認証し、セッションを再生成する
     * リクエスト時のセッション ID と再生成後のセッション ID を返す
     *
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
