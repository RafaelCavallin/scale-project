<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManagerOnDutyController;
use App\Http\Controllers\OnDutyController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('/login', [AuthController::class, 'login']);

Route::resource('/users', UserController::class);
Route::resource('/types', TypeController::class)->middleware('auth:sanctum');
Route::resource('/addresses', AddressController::class);
Route::resource('/locations', LocationController::class);
Route::resource('/onduties', OnDutyController::class);

Route::prefix('management')->group(function () {
    Route::get('/list', [ManagerOnDutyController::class, 'listAllOnDuty'])->middleware('auth:sanctum');
    Route::get('/listbyuser', [ManagerOnDutyController::class, 'listAllOnDutyByUser'])->middleware('auth:sanctum');
});
