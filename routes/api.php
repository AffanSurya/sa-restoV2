<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\MenuItem1Controller;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\ApiMenuItem1Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route api menu item 1
Route::get('/menuItem1', [ApiMenuItem1Controller::class, 'index']);
Route::post('/menuItem1/store', [ApiMenuItem1Controller::class, 'store']);
Route::get('/menuItem1/show/{id}', [ApiMenuItem1Controller::class, 'show']);
Route::put('/menuItem1/update/{id}', [ApiMenuItem1Controller::class, 'update']);
Route::delete('/menuItem1/delete/{id}', [ApiMenuItem1Controller::class, 'destroy']);


// Route api for react app
// route auth
Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::post('/logout', LogoutController::class)->name('logout');

Route::middleware('auth:api')->get('/user', function (Request $request) { //coba nanti hapus
    return $request->user();
});

// Route api menu item 1
Route::get('/menuItem1', [MenuItem1Controller::class, 'index']);
Route::post('/menuItem1/store', [MenuItem1Controller::class, 'store']);
Route::get('/menuItem1/show/{id}', [MenuItem1Controller::class, 'show']);
Route::put('/menuItem1/update/{id}', [MenuItem1Controller::class, 'update']);
Route::delete('/menuItem1/delete/{id}', [MenuItem1Controller::class, 'destroy']);

// Route api order
Route::get('/order', [OrderController::class, 'index']);
Route::post('/order/store', [OrderController::class, 'store']);
Route::get('/order/show/{id}', [OrderController::class, 'show']);
Route::put('/order/update/{id}', [OrderController::class, 'update']);
Route::delete('/order/delete/{id}', [OrderController::class, 'destroy']);

// Route api order item
Route::post('/orderItem/store', [OrderItemController::class, 'store']);
