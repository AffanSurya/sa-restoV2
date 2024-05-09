<?php

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
