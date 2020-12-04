<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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





        
    Route::get('/register', [RegisterController::class , 'index'])->name('register');
    Route::post('/register', [RegisterController::class , 'store'])->name('register');

    Route::get('/login', [LoginController::class , 'index'])->name('login');
    Route::post('/login', [LoginController::class , 'store'])->name('login');

    Route::get('/users/{user:username}', [ProfileController::class , 'show'])->name('profile');

    Route::post('/follow/{user:username}', [FollowController::class , 'store'])->name('follow');
    Route::delete('/follow/{user:username}', [FollowController::class , 'destroy'])->name('follow');

    Route::post('/logout', [LogoutController::class , 'store'])->name('logout');

    Route::get('/posts', [PostController::class , 'index'])->name('posts');
    Route::get('/', [PostController::class , 'index'])->name('posts');
    Route::post('/posts', [PostController::class , 'store'])->name('posts');
    Route::get('/posts/{post}', [PostController::class , 'show'])->name('posts.show');
    Route::delete('/posts/{post}', [PostController::class , 'destroy'])->name('posts.delete');

    Route::post('/like/{post}', [LikeController::class , 'store'])->name('like');
    Route::delete('/like/{post}', [LikeController::class , 'destroy'])->name('like');

    Route::post('/comment/{post}', [CommentController::class , 'store'])->name('comments');
    Route::delete('/comment/{comment}', [CommentController::class , 'destroy'])->name('comments.delete');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('Dashboard');


});