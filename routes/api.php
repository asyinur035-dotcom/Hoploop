<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\JobController;
use App\Http\Controllers\API\SavedJobController;
use App\Http\Controllers\API\ContactController;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

// Public job listing
Route::get('/public/jobs',[JobController::class,'index']);
Route::get('/public/jobs/{job}',[JobController::class,'show']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);

    // profile (pelamar)
    Route::get('/profile',[ProfileController::class,'show']);
    Route::post('/profile',[ProfileController::class,'update']);

    // company (perusahaan)
    Route::get('/company',[CompanyController::class,'show']);
    Route::post('/company',[CompanyController::class,'update']);

    // jobs
    Route::get('/jobs',[JobController::class,'index']);
    Route::get('/jobs/{job}',[JobController::class,'show']);
    Route::post('/jobs',[JobController::class,'store']);
    Route::put('/jobs/{job}',[JobController::class,'update']);
    Route::delete('/jobs/{job}',[JobController::class,'destroy']);

    // saved jobs
    Route::post('/jobs/{job}/save',[SavedJobController::class,'store']);
    Route::delete('/jobs/{job}/unsave',[SavedJobController::class,'destroy']);

    // contact
    Route::post('/jobs/{job}/contact',[ContactController::class,'store']);
});
