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

Route:: get('customer/get/all', [CustomerController::class, 'getAPI']);

Route:: get('inventory', [InventoryController::class, 'index']);
Route:: get('inventory/create', [InventoryController::class, 'create']);
Route:: post('inventory/create', [InventoryController::class, 'store']);
Route:: get('inventory/{id}/edit', [InventoryController::class, 'edit']);
Route:: put('inventory/{id}/edit', [InventoryController::class, 'update']);
Route:: get('inventory/{id}/delete', [InventoryController::class, 'destroy']);

Route:: get('inventory/get/all', [CustomerController::class, 'getAPI']);