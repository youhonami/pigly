<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;


class FortifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Fortify::loginView(function () {
            return view('login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        // 追加：ログインのレートリミッター定義
        RateLimiter::for(
            'login',
            function (Request $request) {
                $email = (string) $request->email;

                return Limit::perMinute(5)->by($email . $request->ip());
            }
        );
    }
}
