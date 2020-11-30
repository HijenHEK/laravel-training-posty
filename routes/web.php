<?php

use App\Http\Controllers\Auth\RegisterController;
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
    return view('posts.index');
})->name('Posts');
Route::get('/register', [RegisterController::class , 'index'])->name('Register');
Route::post('/register', [RegisterController::class , 'store'])->name('Register');
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->name('Dashboard')->middleware('auth');
