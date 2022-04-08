<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

 // Login Routes
 Route::post('/login',[AuthController::class, 'Login']);

 // Register Routes
Route::post('/register',[AuthController::class, 'Register']);

 // Forget Password Routes
 Route::post('/forgetpassword',[ForgetController::class, 'ForgetPassword']);

 // Reset Password Routes
Route::post('/resetpassword',[ResetController::class, 'ResetPassword']);

 // Current User Route
Route::get('/user',[UserController::class, 'User'])->middleware('auth:api');
