<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

Route::get('/welcome', function (Request $request) {
    return view('welcome');
})->name('welcome');

Route::get('/{board}', [ThreadController::class, 'index'])
    ->name('board.index');

Route::get('/{board}/{thread}', [ThreadController::class, 'view'])
    ->name('thread.view');
