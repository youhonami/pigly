<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RegisterStepController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;

Route::get('/', [TestController::class, 'index']);
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
//ログイン後のダッシュボード
Route::get('/index', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('index');
Route::middleware(['auth'])->group(function () {
    // 編集画面の表示（ルート名 weight.edit）
    Route::get('/weight/{id}/edit', [WeightLogController::class, 'edit'])->name('weight.edit');

    // 編集内容の更新（保存）
    Route::put('/weight/{id}', [WeightLogController::class, 'update'])->name('weight.update');

    // 体重記録追加
    Route::get('/weight/create', [WeightLogController::class, 'create'])->name('weight.create');
    Route::post('/weight', [WeightLogController::class, 'store'])->name('weight.store');
});
//目標体重設定
Route::middleware(['auth'])->group(function () {
    Route::get('/weight/target/edit', [WeightTargetController::class, 'edit'])->name('weight.target.edit');
    Route::post('/weight/target/update', [WeightTargetController::class, 'update'])->name('weight.target.update');
});
//ログアウト
Route::get('/', function () {
    return view('login');
});
