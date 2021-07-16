<?php

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
    Route::get('/service',[ServiceController::class,'index']);
    Route::get('/serviceData',[ServiceController::class,'getData']);
    Route::post('/serviceDelete',[ServiceController::class,'deleteData']);
});



