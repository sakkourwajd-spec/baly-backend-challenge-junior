<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OrderController;

// 1. Route to update a driver's active/inactive status
Route::patch('/drivers/{id}/status', [DriverController::class, 'updateStatus']);

// 2. Route to place a new ride/food order
Route::post('/orders', [OrderController::class, 'store']);

// 3. Route to update an order's progress status
Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus']);
