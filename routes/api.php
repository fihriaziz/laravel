<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\BonusPembayaranController;
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

Route::post('/login', [AuthenticatedController::class, 'login']);
Route::middleware('auth:sanctum')->group(function() {
    Route::post('/submit-bonus', [BonusPembayaranController::class, 'store']);
    Route::get('/getAll', [BonusPembayaranController::class, 'getAll']);
    Route::get('/getBy/{id}', [BonusPembayaranController::class, 'show']);
    Route::delete('/delete/{id}', [BonusPembayaranController::class, 'destroy']);
});
