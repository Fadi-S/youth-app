<?php

use App\Http\Controllers\API\AuthController;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {

    Route::get('/user', [AuthController::class, 'loggedUser']);

    Route::get('/sections', function () {
        return [
          'sections' => Section::with(['tasks' =>
              fn($query) => $query->whereDate('date', Carbon::today())
          ])->toArray(),
        ];
    });

});
