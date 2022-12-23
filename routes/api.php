<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::middleware(['auth'])->group(function () {
    Route::put('/todos/{id}/done', [TodoController::class, 'done']);
    Route::put('/todos/{id}/move', [TodoController::class, 'move']);
    Route::apiResources([
        'todos' => TodoController::class,
    ]);
});
