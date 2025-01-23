<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\User\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->group(function () {

// });

// Get users by role
Route::get('/users/role/{role}', [UserController::class, 'getUsersByRole']);

// Update user profile
Route::put('/users/{id}/profile', [UserController::class, 'updateProfile']);

// Verify email
Route::post('/users/{id}/verify-email', [UserController::class, 'verifyEmail']);

// Reset password
Route::post('/users/reset-password', [UserController::class, 'resetPassword']);

// Register a new user
Route::post('/register', [UserController::class, 'register']);
