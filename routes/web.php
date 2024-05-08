<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Menu1Controller;
use App\Http\Controllers\MenuItem1Controller;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('actionregister', [RegisterController::class, 'actionRegister'])->name('actionRegister');

Route::get('/', [HomeController::class, 'index'])->name('home')->Middleware('auth');
Route::get('actionLogout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');

// route menu item 1
Route::get('/menuItem1', [MenuItem1Controller::class, 'index'])->name('menuItem1')->middleware('auth');

Route::get('/menuItem1/create', [MenuItem1Controller::class, 'create'])->name('menuItem1.create')->middleware('auth');
Route::post('/menuItem1/store', [MenuItem1Controller::class, 'store'])->name('menuItem1.store')->middleware('auth');

Route::get('/menuItem1/edit/{id}', [MenuItem1Controller::class, 'edit'])->name('menuItem1.edit')->middleware('auth');
Route::put('/menuItem1/update/{id}', [MenuItem1Controller::class, 'update'])->name('menuItem1.update')->middleware('auth');

Route::delete('/menuItem1/delete/{id}', [MenuItem1Controller::class, 'destroy'])->name('menuItem1.destroy')->middleware('auth');
