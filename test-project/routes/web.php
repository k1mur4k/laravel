<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ManagementUserController;

// 管理者ページのルート
Route::get('/admin.index', [ManagementUserController::class, 'index'])
            ->name('admin.index');

// ユーザーの編集ページ
Route::get('/user/{id}/edit', [ManagementUserController::class, 'edit'])
            ->name('user.edit');

// ユーザーの更新
Route::put('/user/{id}', [ManagementUserController::class, 'update'])
    ->name('user.update');

// ユーザーの削除
Route::delete('/user/{id}/delete', [ManagementUserController::class, 'delete'])
            ->name('user.delete');

// ユーザーの論理削除
Route::delete('/user/{id}/soft-delete', [ManagementUserController::class, 'softDelete'])
    ->name('user.soft-delete');

// ユーザ表示テスト
// Route::get('/unko', [ManagementUserController::class, 'test'])
//             ->name('unko');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/management', function (){
//     return view('management');
// })

require __DIR__.'/auth.php';
