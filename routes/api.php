<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\BookController;
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

Route::prefix('auth')->group(function() {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});


// users

Route::middleware(['auth:sanctum'])->group(function(){
    Route::prefix('users')->group(function() {
        Route::get('all_doctors', [DoctorController::class, 'getAllDoctors']);
        Route::get('all_specials', [SpecialityController::class, 'getAllSpecialists']);
        Route::get('specials_doctors/{special_id}', [DoctorController::class, 'getDoctorsWithSpecials']);
        Route::post('book_doctors/{doctor_id}', [BookController::class, 'BookForDoctors']);
        Route::get('my_books', [BookController::class, 'getMyBook']);
    });
});
