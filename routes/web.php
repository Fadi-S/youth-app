<?php

use App\Models\Admin;
use App\Http\Controllers\{DashboardController};

use App\Http\Livewire\{Forms\SectionForm,
    Forms\UserForm,
    ViewAdmins,
    Forms\AdminForm,
    LoginPage,
    ViewSections,
    ViewUsers};
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

    Route::get('/users/create', UserForm::class);
    Route::get('/users/{user}/edit', UserForm::class);
    Route::get('/users', ViewUsers::class);

    Route::get('/sections/create', SectionForm::class);
    Route::get('/sections/{section}/edit', SectionForm::class);
    Route::get('/sections', ViewSections::class);


});

Route::get('/login', LoginPage::class)->name('login');
Route::post('/logout', function () {
    auth()->logout();

    return redirect('/login');
});