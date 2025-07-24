<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Laravel\Fortify\Contracts\LoginResponse;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate(); // フォームリクエスト内のバリデーション＆ログイン
        $request->session()->regenerate();

        return app(LoginResponse::class); // Fortify のログイン後リダイレクト
    }
}
