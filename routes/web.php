<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index']) ->name('admin_home');
        //users
        Route::get('/users/list', [App\Http\Controllers\Admin\UsersController::class, 'list']) ->name('users_list');
        //posts
        Route::get('/post/index', [App\Http\Controllers\Admin\PostsController::class, 'index']) ->name('post_index');
        Route::get('/post/list', [App\Http\Controllers\Admin\PostsController::class, 'list']) ->name('post_list');
        Route::post('/post/create', [App\Http\Controllers\Admin\PostsController::class, 'create']) ->name('post_create');
        Route::put('/post/edit', [App\Http\Controllers\Admin\PostsController::class, 'edit']) ->name('post_edit');
        Route::delete('/post/delete', [App\Http\Controllers\Admin\PostsController::class, 'delete']) ->name('post_delete');
});
