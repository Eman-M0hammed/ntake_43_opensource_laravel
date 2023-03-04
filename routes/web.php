<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts', [PostsController::class, 'index']);
Route::get('/showPost/{id}', [PostsController::class, 'show'])->name('post.show');
Route::get('/createPost', [PostsController::class, 'create'])->name('post.create');
Route::post('/createPost', [PostsController::class, 'store'])->name('post.store');
Route::delete('/deletePost/{id}', [PostsController::class, 'destroy'])->name('post.destroy');
Route::get('/updatePost/{id}', [PostsController::class, 'update'])->name('post.update');
Route::put('/editPost/{id}', [PostsController::class, 'edit'])->name('post.edit');
// user routes
Route::get('/users', [UsersController::class, 'index']);
Route::get('/showUsers/{id}', [UsersController::class, 'show'])->name('user.show');
Route::get('/createUser', [UsersController::class, 'create'])->name('user.create');
Route::post('/createUser', [UsersController::class, 'store'])->name('user.store');
Route::delete('/deleteUser/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
Route::get('/updateUser/{id}', [UsersController::class, 'update'])->name('user.update');
Route::put('/editUser/{id}', [UsersController::class, 'edit'])->name('user.edit');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/login/google', [App\Http\Controllers\AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\AuthController::class, 'handleGoogleCallback']);
//Facebook
Route::get('/login/facebook', [App\Http\Controllers\AuthController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\AuthController::class, 'handleFacebookCallback']);
//Github
Route::get('/login/github', [App\Http\Controllers\AuthController::class, 'redirectToGithub'])->name('login.github');
Route::get('/login/github/callback', [App\Http\Controllers\AuthController::class, 'handleGithubCallback']);