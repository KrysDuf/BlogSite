<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
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
    return redirect("/home");
});

Route::resource('posts', 'PostsController');
route::get('posts/{post}/comment', [CommentsController::class, 'create'])->name('comments.create');
route::post('posts/{post}/comment', [CommentsController::class, 'store'])->name('comments.store');
route::delete('posts/{post}/comment/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');

//Route::get('/', [PostsController::class, 'index'])->name('posts.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

