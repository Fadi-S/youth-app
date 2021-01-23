<?php

use App\Http\Controllers\API\AuthController;
use App\Models\Section;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {

    Route::get('/user', [AuthController::class, 'loggedUser']);

    Route::get('/sections', function () {
        $user = auth()->user();

        $filter = fn($query) => $query
            ->whereNotIn($user->tasks()->pluck('id'))
            ->whereDate('date', '<=', Carbon::now());

        return [
            'sections' => Section::with([
                'tasks' => $filter
            ])->whereHas('tasks', $filter)
                ->get()->toArray(),
        ];
    });

    Route::post('/tasks/{task}', function (Task $task) {
        $user = auth()->user();

        $user->complete($task);

        return true;
    });

});
