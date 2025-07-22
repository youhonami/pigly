<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RegisterStepController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [TestController::class, 'index']);
//ログイン機能
Route::get('/index', function () {
    return view('index');
})->middleware(['auth']);
//新規会員登録機能
Route::get('/register', function () {
    return view('register');
})->name('register');
//新規会員登録STEP２
Route::get('/register/step2', function () {
    return view('register_step2');
})->middleware(['auth'])->name('register.step2');

Route::middleware(['auth'])->group(function () {
    // STEP2フォームの表示
    Route::get('/register/step2', [RegisterStepController::class, 'showStep2'])->name('register.step2');

    // STEP2フォームの保存処理（←ここが必要）
    Route::post('/register/step2', [RegisterStepController::class, 'storeStep2'])->name('register.weight.store');
});
