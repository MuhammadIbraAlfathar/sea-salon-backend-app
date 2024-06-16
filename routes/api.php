<?php

use App\Http\Controllers\API\BranchSalonController;
use App\Http\Controllers\API\CustomerReviewController;
use App\Http\Controllers\API\ReservationController;
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
    Route::post('create-reservation', [ReservationController::class, 'createReservation']);
});



//auth
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
//end auth

//review
Route::get('get-review', [CustomerReviewController::class, 'getAll']);


//branch_Salon
Route::post('create-branch', [BranchSalonController::class, 'createBranch']);
Route::get('branch-salon', [BranchSalonController::class, 'getAll']);
