<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


Route::get('/test', [TestController::class,'test'])
->name('test');

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

// ユーザー管理
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // ユーザー編集フォーム表示
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // ユーザー情報更新
    Route::delete('users/{user}/soft-delete', [UserController::class, 'softDelete'])->name('users.softDelete');
    Route::delete('users/{user}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
    Route::post('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
});

require __DIR__.'/auth.php';
