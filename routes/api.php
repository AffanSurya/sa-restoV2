<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\MenuItem1Controller;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\RegisterController;
// use App\Http\Controllers\ApiMenuItem1Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route api menu item 1
// Route::get('/menuItem1', [ApiMenuItem1Controller::class, 'index']);
// Route::post('/menuItem1/store', [ApiMenuItem1Controller::class, 'store']);
// Route::get('/menuItem1/show/{id}', [ApiMenuItem1Controller::class, 'show']);
// Route::put('/menuItem1/update/{id}', [ApiMenuItem1Controller::class, 'update']);
// Route::delete('/menuItem1/delete/{id}', [ApiMenuItem1Controller::class, 'destroy']);



Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');

Route::get('/top-menu-items', [MenuItem1Controller::class, 'getTopMenuItems']);

Route::middleware('auth:api')->group(function () {
    // role user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/menuItem1', [MenuItem1Controller::class, 'index']);
    Route::post('/order/store', [OrderController::class, 'store']);
    Route::put('/order/update/{order}', [OrderController::class, 'update']);
    Route::post('/orderItem/store', [OrderItemController::class, 'store']);

    Route::middleware('IsAdmin')->group(function () {
        // role admin
        Route::post('/menuItem1/store', [MenuItem1Controller::class, 'store']);
        Route::get('/menuItem1/show/{menuItem1}', [MenuItem1Controller::class, 'show']);
        Route::put('/menuItem1/update/{menuItem1}', [MenuItem1Controller::class, 'update']);
        Route::delete('/menuItem1/delete/{menuItem1}', [MenuItem1Controller::class, 'destroy']);

        Route::get('/order', [OrderController::class, 'index']);
        Route::get('/order/show/{order}', [OrderController::class, 'show']);
        Route::delete('/order/delete/{order}', [OrderController::class, 'destroy']);

        Route::get('/order/statistics', [OrderController::class, 'getOrderStatistics']);
    });
});
