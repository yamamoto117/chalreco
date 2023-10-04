<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/{post}', [PostController::class, 'show'])
        ->name('show')
        ->where('post', '[0-9]+');

    Route::get('/create', [PostController::class, 'create'])
        ->name('create')
        ->middleware('auth');

    Route::post('/store', [PostController::class, 'store'])
        ->name('store');

    Route::get('/{post}/edit', [PostController::class, 'edit'])
        ->name('edit')
        ->where('post', '[0-9]+');

    Route::patch('/{post}/update', [PostController::class, 'update'])
        ->name('update')
        ->where('post', '[0-9]+');

    Route::delete('/{post}/destroy', [PostController::class, 'destroy'])
        ->name('destroy')
        ->where('post', '[0-9]+');

    Route::put('/{post}/good', [PostController::class, 'good'])
        ->name('good')
        ->middleware('auth');

    Route::delete('/{post}/good', [PostController::class, 'ungood'])
        ->name('ungood')
        ->middleware('auth');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', [UserController::class, 'show'])->name('show');
    Route::get('/{name}/followings', [UserController::class, 'followings'])->name('followings');
    Route::get('/{name}/followers', [UserController::class, 'followers'])->name('followers');
    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', [UserController::class, 'follow'])->name('follow');
        Route::delete('/{name}/follow', [UserController::class, 'unfollow'])->name('unfollow');
    });
});

require __DIR__ . '/auth.php';
