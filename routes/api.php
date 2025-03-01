<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\ConsumerController;
use App\Http\Controllers\API\GasController;
use App\Http\Controllers\API\OutletController;
use App\Http\Controllers\API\RequestController;
use App\Http\Controllers\API\ScheduleController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\OutletManagerController;
use App\Http\Controllers\RegisterController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/me', [UserController::class, 'me']);

        Route::get('/admin', [AdminController::class, 'index']);
        Route::post('/admin', [AdminController::class, 'store']);
        Route::get('/admin/{id}', [AdminController::class, 'show']);
        Route::put('/admin/{id}', [AdminController::class, 'update']);
        Route::delete('/admin/{id}', [AdminController::class, 'destroy']);

        Route::get('/schedule', [ScheduleController::class, 'index']);
        Route::get('/schedule/count', [ScheduleController::class, 'count']);
        Route::post('/schedule', [ScheduleController::class, 'store']);
        Route::get('/schedule/{id}', [ScheduleController::class, 'show']);
        Route::get('/schedule/outlet/{id}', [ScheduleController::class, 'getByOutletID']);
        Route::put('/schedule/{id}', [ScheduleController::class, 'update']);
        Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy']);

        Route::get('/consumer', [ConsumerController::class, 'index']);
        Route::get('/consumer/count', [ConsumerController::class, 'count']);
        Route::get('/consumer/search', [ConsumerController::class, 'searchByNIC']);
        Route::post('/consumer', [ConsumerController::class, 'store']);
        Route::get('/consumer/{id}', [ConsumerController::class, 'show']);
        Route::put('/consumer/{id}', [ConsumerController::class, 'update']);
        Route::delete('/consumer/{id}', [ConsumerController::class, 'destroy']);

        Route::get('/request', [RequestController::class, 'index']);
        Route::get('/request/user', [RequestController::class, 'getAllByLoginUser']);
        Route::get('/request/count', [RequestController::class, 'count']);
        Route::post('/request', [RequestController::class, 'store']);
        Route::get('/request/{id}', [RequestController::class, 'show']);
        Route::get('/request/token/{token}', [RequestController::class, 'searchByToken']);
        Route::put('/request/status/{id}', [RequestController::class, 'updateRequestStatus']);
        Route::put('/request/consumer/status/{id}', [RequestController::class, 'updateRequestConsumerStatus']);
        Route::put('/request/consumer/{id}', [RequestController::class, 'assignRequestToNewConsumer']);
        Route::delete('/request/{id}', [RequestController::class, 'destroy']);

        Route::get('/gas', [GasController::class, 'index']);
        Route::post('/gas', [GasController::class, 'store']);
        Route::get('/gas/{id}', [GasController::class, 'show']);
        Route::put('/gas/{id}', [GasController::class, 'update']);
        Route::delete('/gas/{id}', [GasController::class, 'destroy']);

        Route::get('/outlet', [OutletController::class, 'index']);
        Route::get('/outlet/count', [OutletController::class, 'count']);
        Route::get('/outlet/search', [OutletController::class, 'searchByName']);
        Route::post('/outlet', [OutletController::class, 'store']);
        Route::get('/outlet/{id}', [OutletController::class, 'show']);
        Route::put('/outlet/{id}', [OutletController::class, 'update']);
        Route::put('/outlet/status/{id}', [OutletController::class, 'updateStatus']);
        Route::delete('/outlet/{id}', [OutletController::class, 'destroy']);

        Route::get('/outletManager', [OutletManagerController::class, 'index']);
        Route::post('/outletManager', [OutletManagerController::class, 'store']);
        Route::get('/outletManager/{id}', [OutletManagerController::class, 'show']);
        Route::put('/outletManager/{id}', [OutletManagerController::class, 'update']);
        Route::delete('/outletManager/{id}', [OutletManagerController::class, 'destroy']);
    });
});

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/forgot-password', [AuthenticationController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthenticationController::class, 'resetPassword']);
    Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
});

// @TODO - This is tempery api to send gas pickup emails to consumers
Route::post('/schedule/pickup-emails', [ScheduleController::class, 'sendPickupEmails']);
