<?php

use App\Http\Controllers\API\AuthController;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {

    Route::get('/user', [AuthController::class, 'loggedUser']);

    Route::get('/sections', function () {
        return [
          'sections' => Section::all()->toArray(),
        ];
    });

});
