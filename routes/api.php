<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::apiResource('type-state', App\Http\Controllers\TypeStateController::class);

Route::apiResource('category', App\Http\Controllers\CategoryController::class);

Route::apiResource('priority', App\Http\Controllers\PriorityController::class);

Route::apiResource('role', App\Http\Controllers\RoleController::class);

Route::apiResource('task', App\Http\Controllers\TaskController::class);

Route::apiResource('proyect', App\Http\Controllers\ProyectController::class);

Route::apiResource('member', App\Http\Controllers\MemberController::class);
