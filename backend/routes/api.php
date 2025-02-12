<?php

use App\Http\Controllers\DesenvolvedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NivelController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/niveis', [NivelController::class, 'store']);

Route::Get('/niveis', [NivelController::class, 'index']);

Route::delete('/niveis/{id}', [NivelController::class, 'destroy']);

Route::Patch('/niveis/{id}', [NivelController::class, 'update']);

Route::post('/desenvolvedores',[DesenvolvedorController::class, 'store']);
