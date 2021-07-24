<?php

use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\CourseController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ProjectController;
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
Route::post('/contactmsg',[WebsiteController::class,'contact']);

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
    Route::post('/serviceCreate',[ServiceController::class,'createService']);

    //course management route start here
    Route::get('/course',[CourseController::class,'index']);
    //for all data fetch to course table by axios
    Route::get('/courseData',[CourseController::class,'getData']);
    //for single row data delete 
    Route::post('/courseDelete',[CourseController::class,'deleteData']);
    //create new course
    Route::post('/courseCreate',[CourseController::class,'create']);
    // update course 
    Route::post('/courseUpdate',[CourseController::class,'CourseUpdate']);
    // single data fetch from database
    Route::post('/singleData',[CourseController::class,'getSingleData']);

    // project management
    Route::get('/project',[ProjectController::class,'index']);
    //for all data fetch to project table by axios
    Route::get('/projectData',[ProjectController::class,'getData']);
    //for single row data delete
    Route::post('/projectData',[ProjectController::class,'deleteData']);
    //create new project
    Route::post('/projectCreate',[ProjectController::class,'create']);
    // project update
    Route::post('/projectUpdate',[ProjectController::class,'ProjectUpdate']);
    //single data fetch from database
    Route::post('/projectSingleData',[ProjectController::class,'getSingleData']);
    //for project delete by id with axios
    Route::post('/projectDelete',[ProjectController::class,'delete']);

    //contact management
    Route::get('/contact',[ContactController::class,'index']);
});



