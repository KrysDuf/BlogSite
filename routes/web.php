<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\AdminsController;
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



Route::post('/storeComment', [CommentsController::class, 'store'])->name('comments.store');
Route::resource('posts', 'PostsController');
route::get('posts/{post}/comment', [CommentsController::class, 'create'])->name('comments.create');
route::patch('posts/{post}/comment', [CommentsController::class, 'update'])->name('comments.update');
route::get('posts/{post}/comment/{comment}/edit', [CommentsController::class, 'edit'])->name('comments.edit');
route::delete('posts/{post}/comment/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/admin/roleChange', [App\Http\Controllers\AdminsController::class, 'roleChange'])->name('admin.roleChange')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin')->middleware('auth');


Auth::routes();

