<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
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




Route::prefix('admin')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users-profile',[AdminController::class, 'users_profile'])->name('admin.users_profile');
});


Route::prefix('cliente')->group(function(){
    Route::get('/',[ClienteController::class, 'index'])->name('cliente.index');
});


Route::redirect('/', '/login');
Route::get('/login', [LoginController::class, 'login'])->name('login.page');
Route::post('/auth',[LoginController::class, 'auth'])->name('auth.user');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register.page');
Route::post('/register', [LoginController::class, 'create'])->name('create.acount');





Route::get('teste', function () {
    return view('welcome');
});


