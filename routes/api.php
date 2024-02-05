<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ThreadController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')
    ->name('v1.')
    ->group(function() {

        Route::post('auth', [AuthController::class, 'create'])
            ->name('auth');

        Route::middleware('auth:sanctum')
            ->group(function() {

                Route::apiResource('users', UserController::class);
                Route::apiResource('threads', ThreadController::class);

        });

});
