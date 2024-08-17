<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountDownController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin_login');
});

// Route::resource('/users_section', UserController::class);

Route::get('/admin_dashboard', [MainController::class, 'index']);
Route::get('/admin_login', [MainController::class, 'logout'])->name('admin_login');
Route::get('/create_user', [UserController::class, 'index'])->name('users_section.create_user');
Route::delete('/users_section/delete/{id}', [UserController::class, 'destroy'])->name('users_section.destroy');
Route::get('/users_section/edit/{id}', [UserController::class, 'edit'])->name('users_section.edit_user');
Route::get('/user_dashboard', [MainController::class, 'users_index'])->name('users_section.user_dashboard');
Route::get('/users_section.index', [MainController::class, 'users_show'])->name('users_section.index');
Route::get('/users_section', [MainController::class, 'profil'])->name('users_section.profil');
Route::get('/admin_profil', [MainController::class, 'admin_profil'])->name('admin_profil');
// Route::get('/countdown', [CountdownController::class, 'countdown']);


//--------------------------------------------------------------------------------------------
Route::post('/users_section/update/{id}', [UserController::class, 'update'])->name('users_section.update');
Route::post('/users_section/create_user', [UserController::class, 'store'])->name('users_section.store');
Route::post('/admin_dashboard', [AuthController::class, 'login'])->name('admin_dashboard');