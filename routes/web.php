<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\LoginPage;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/profile', [DashboardController::class, 'show'])->name('profile');

});

Route::get('/login', LoginPage::class)->name('login');
Route::post('/logout', function () {
    auth()->logout();

    return redirect('/login');
});