<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['reset' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/ganti-password', [HomeController::class, 'editPassword'])->name('password.edit');
    Route::put('/ganti-password', [HomeController::class, 'updatePassword'])->name('password.update');

    // Dapat diakses oleh Admin dan Kasir
    Route::resource('pesanans', PesananController::class)->except(['show']);

    // Khusus Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('kategoris', KategoriController::class)->except(['show']);
        Route::resource('menus', MenuController::class)->except(['show']);
        Route::get('/users', [HomeController::class, 'indexUsers'])->name('users.index');
        Route::get('/users/create', [HomeController::class, 'createUser'])->name('users.create');
        Route::post('/users', [HomeController::class, 'storeUser'])->name('users.store');
        Route::delete('/users/{user}', [HomeController::class, 'destroyUser'])->name('users.destroy');
    });
});