<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("/user")->name('user.')->group(function (){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/login', [UserController::class, 'login'])->name('login');
        Route::view('/forgot-password','dashboard.user.passwords.email')->name('forgot-password');
        Route::view('/reset','dashboard.user.passwords.reset')->name('reset');
        Route::view('/confirm','dashboard.user.passwords.confirm')->name('confirm');
    });
    Route::middleware(['auth:web'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class,'logout'])->name('logout');
    });
});
Route::prefix("/admin")->name('admin.')->group(function (){
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('login');
    });
    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('logout', [AdminController::class,'logout'])->name('logout');
    });
});
