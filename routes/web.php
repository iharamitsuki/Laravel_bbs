<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::prefix('post')
->controller(PostController::class)
->middleware(['auth'])
->name('post.')
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/{id}/delete', 'delete')->name('delete');
});

Route::prefix('comment')
->controller(CommentController::class)
->middleware(['auth'])
->name('comment.')
->group(function(){
    Route::get('/{id}/create', 'create')->name('create');
    Route::post('/{id}/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/{id}/delete', 'delete')->name('delete');
});

Route::prefix('like')
->controller(LikeController::class)
->middleware(['auth'])
->name('like.')
->group(function(){
    Route::post('/{id}/store', 'store')->name('store');
    Route::post('/{id}/delete', 'delete')->name('delete');
});

require __DIR__.'/auth.php';

//本番pull
