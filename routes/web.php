<?php

use App\Http\Controllers\PostsController;
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
// home
// showHome()
// select product
// select category
// select recommended
Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts', [PostsController::class, 'index']);
Route::get('/showPost/{id}', [PostsController::class, 'show'])->name('post.show');
Route::get('/createPost', [PostsController::class, 'create'])->name('post.create');
Route::post('/createPost', [PostsController::class, 'store'])->name('post.store');
Route::delete('/deletePost/{id}', [PostsController::class, 'destroy'])->name('post.destroy');
