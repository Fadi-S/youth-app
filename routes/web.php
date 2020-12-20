<?php

use App\Http\Livewire\LoginPage;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', fn() => view('dashboard'));

});

Route::get('/login', LoginPage::class)->name('login');