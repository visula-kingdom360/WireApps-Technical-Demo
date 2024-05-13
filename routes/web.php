<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('welcome'); // TODO:: need a landing page
});

Route:: get('login', [UserController::class, 'login']);
Route:: post('login/validation', [UserController::class, 'verification']);
Route:: get('user/home', [UserController::class, 'home']);


Route:: get('customer', [CustomerController::class, 'index']);
Route:: get('customer/create', [CustomerController::class, 'create']);
Route:: post('customer/create', [CustomerController::class, 'store']);
Route:: get('customer/{id}/edit', [CustomerController::class, 'edit']);
Route:: put('customer/{id}/edit', [CustomerController::class, 'update']);
Route:: get('customer/{id}/delete', [CustomerController::class, 'destroy']);

Route:: get('inventory', [InventoryController::class, 'inventory']);
