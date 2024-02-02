<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ThreadController;
use Illuminate\Http\Request;
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

#Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
#    return $request->user();
#});

Route::prefix('v1')
    ->name('v1.')
    ->group(function() {

//        Route::get('user', function (Request $request) {
//            dd($request);
//            return $request->user();
//        })->name('user');

        Route::post('auth', [AuthController::class, 'create'])
            ->name('auth');

        Route::middleware('auth.api')->group(function() {

            Route::apiResource('threads', ThreadController::class);

        });

    });
