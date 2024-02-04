<?php

use App\Http\Controllers\API\V1\PostController as V1PostController;
use App\Http\Controllers\API\V2\PostController as V2PostController;
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

Route::prefix('v1')->group(function () {
    Route::get('/posts', [V1PostController::class, 'index']);
    Route::get('/posts/{post_id}', [V1PostController::class, 'show']);
});

Route::prefix('v2')->group(function () {
    Route::get('/posts', [V2PostController::class, 'index']);
});