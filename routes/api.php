<?php

use App\Http\Controllers\API\CustomerReviewController;
use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('review', [CustomerReviewController::class, 'create_review']);
});



//auth
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
//end auth

//review
Route::get('get-review', [CustomerReviewController::class, 'getAll']);
