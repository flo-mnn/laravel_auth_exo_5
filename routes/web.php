<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome',[
        'profiles'=>Profile::all(),
        'users'=>User::all()
    ]);
});

Auth::routes();

Route::resource('photos',PhotoController::class);
Route::resource('users',UserController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
