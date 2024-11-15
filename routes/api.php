<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Course Routes
// Route::resource('courses', CourseController::class);

// Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::get('getCourseLists',[CourseController::class, 'index']);
Route::get('getCourseById/{id}',[CourseController::class, 'getCourseById']);
Route::post('saveEnquiry',[HomeController::class, 'saveEnquiry']);
Route::post('saveContactDetails',[HomeController::class, 'saveContactDetails']);


