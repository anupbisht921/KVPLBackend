<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('admin', function(){
//     return view('admin.index');
// });

Route::middleware(['admin_guest'])->prefix('/admin/')->name('admin.')->group(function (){
    Route::get('login',[LoginController::class, 'showLoginPage']);
    Route::post('login',[LoginController::class, 'login'])->name('login');
});


Route::middleware(['admin_auth'])->prefix('/admin/')->name('admin.')->group(function (){
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout',[LoginController::class, 'logout'])->name('logout');

    Route::get('addCourse',[CourseController::class, 'addCourse'])->name('addCourse');
    Route::post('addCourse',[CourseController::class, 'saveCourse'])->name('saveCourse');
    Route::get('courseList',[CourseController::class, 'index'])->name('courseList');
    Route::get('editCourse/{id}',[CourseController::class, 'editCourse'])->name('editCourse');
    Route::post('updateCourse/{id}',[CourseController::class, 'updateCourse'])->name('updateCourse');
    Route::get('deleteCourse/{id}',[CourseController::class, 'deleteCourse'])->name('deleteCourse');


    Route::get('addCourseModule',[CourseController::class, 'addCourseModule'])->name('addCourseModule');
    Route::post('addCourseModule',[CourseController::class, 'saveCourseModule'])->name('saveCourseModule');
    Route::get('courseModuleList',[CourseController::class, 'courseModuleList'])->name('courseModuleList');
    Route::get('editCourseModule/{id}',[CourseController::class, 'editCourseModule'])->name('editCourseModule');
    Route::post('updateCourseModule/{id}',[CourseController::class, 'updateCourseModule'])->name('updateCourseModule');

    Route::get('enquiryList',[DashboardController::class, 'enquiryList'])->name('enquiryList');
    Route::get('contactList',[ContactController::class, 'index'])->name('contactList');
});