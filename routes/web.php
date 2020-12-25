<?php

use App\Models\Admin;
use App\Http\Controllers\{DashboardController};

use App\Http\Livewire\{Forms\SectionForm, ViewAdmins, Forms\AdminForm, LoginPage, ViewSections};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/profile', [DashboardController::class, 'show'])->name('profile');

    Route::get('/admins/create', AdminForm::class);
    Route::get('/admins/{admin}/edit', AdminForm::class);
    Route::get('/admins', ViewAdmins::class);

    Route::get('/admins/{admin}',
        fn(Admin $admin) => view('admins.show', compact('admin'))
    )->name('admins.show');

    Route::get('/sections/create', SectionForm::class);
    Route::get('/sections/{section}/edit', SectionForm::class);
    Route::get('/sections', ViewSections::class);


});

Route::get('/login', LoginPage::class)->name('login');
Route::post('/logout', function () {
    auth()->logout();

    return redirect('/login');
});