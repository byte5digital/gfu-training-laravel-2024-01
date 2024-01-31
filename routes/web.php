<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ThreadController;
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

Route::view('/welcome', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/{board}', [ThreadController::class, 'index'])
    ->name('board.index');

Route::get('/{board}/{thread}', [ThreadController::class, 'view'])
    ->name('board.thread.view');

Route::get('/{board}/thread/create', [ThreadController::class, 'create'])
    ->name('board.thread.create');

Route::post('/{board}/thread/save', [ThreadController::class, 'save'])
    ->name('board.thread.save');

Route::get('/{board}/{thread}/edit', [ThreadController::class, 'edit'])
    ->name('board.thread.view');

