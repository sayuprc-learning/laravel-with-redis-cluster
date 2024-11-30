<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    public function showForm(): View
    {
        return view('auth.login');
    }

    public function handle(LoginRequest $request, Session $session)
    {
        $before = $session->getId();

        $session->regenerate();

        $after = $session->getId();

        return ['before' => $before, 'after' => $after];
    }
}
