<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/{board}', [ThreadController::class, 'index'])
    ->name('board.index');

Route::get('/{board}/{thread}', [ThreadController::class, 'view'])
    ->name('board.thread.view');

Route::middleware('auth')->group(function() {

    Route::get('/{board}/thread/create', [ThreadController::class, 'create'])
        ->name('board.thread.create');

    Route::post('/{board}/thread/insert', [ThreadController::class, 'insert'])
        ->name('board.thread.insert');

    Route::get('/{board}/{thread}/edit', [ThreadController::class, 'edit'])
        ->name('board.thread.edit');

    Route::post('/{board}/{thread}/post/create', [PostController::class, 'insert'])
        ->name('board.thread.post.insert');

});

