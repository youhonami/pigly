<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fortifyのログイン画面
        Fortify::loginView(function () {
            return view('login'); // または view('auth.login')
        });

        // Fortifyの登録画面
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // ログインレート制限（5回/分）
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        // Fortifyのルートのオーバーライド：POST /login をカスタムLoginControllerに差し替え
        Route::post('/login', [LoginController::class, 'login'])->middleware(['web']);
    }
}
