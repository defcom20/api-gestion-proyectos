<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\ProyectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TypeStateController;
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


Route::apiResource('type-state', TypeStateController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('priority', PriorityController::class);
Route::apiResource('role', RoleController::class);
Route::apiResource('task', TaskController::class);
Route::apiResource('proyect', ProyectController::class);
Route::apiResource('member', MemberController::class);
