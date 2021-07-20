<?php

use App\Http\Controllers\dashboard\CourseController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\dashboard\VisitorController;
use App\Http\Controllers\website\WebsiteController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[WebsiteController::class,'index']);

// dashboard Routes 
Route::prefix('/dashboard')->group(function(){
    Route::get('',[DashboardController::class,'index']);
    // service page route 
    Route::get('/visitor',[VisitorController::class,'index']);

    //service management route start here
    Route::get('/service',[ServiceController::class,'index']);
    //for all data fetch to service table by axios
    Route::get('/serviceData',[ServiceController::class,'getData']);
    //for single data delete
    Route::post('/serviceDelete',[ServiceController::class,'deleteData']);
    // for single data fetch by id 
    Route::post('/serviceSingleData',[ServiceController::class,'getSingleData']);
    // for update data by axios
    Route::post('/serviceUpdate',[ServiceController::class,'serviceUpdate']);
    //for create new servcie 
    Route::post('/create',[ServiceController::class,'createService']);

    //course management route start here
    Route::get('/course',[CourseController::class,'index']);
    //for all data fetch to course table by axios
    Route::get('/courseData',[CourseController::class,'getData']);
    //for single delete data
    Route::post('/courseDelete',[CourseController::class,'deleteData']);
    //create new course
    Route::post('/create',[CourseController::class,'create']);
    // update course 
    Route::post('/update',[CourseController::class,'CourseUpdate']);
    // single data fetch from database
    Route::post('/singleData',[CourseController::class,'getSingleData']);
});



