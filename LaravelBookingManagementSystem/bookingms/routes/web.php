<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebpageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Website Routes

Route::get('/',[WebpageController::class,'landing'])->name('webpage.view');
Route::get('page/{name}',[WebpageController::class,'viewPage'])->name('webpage.dynamic');


// Authorization Routes
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'authenticate'])->name('login.authenticate');
Route::get('signup',[AuthController::class,'signup'])->name('signup');
Route::post('signup',[AuthController::class,'createuser'])->name('signup.create');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

// Authenticated Routes for Admin Users
Route::middleware('auth')->group(function(){
    // Dashboard Admin
    Route::get('dashboard/admin',[UserController::class,'adminDashboard'])->name('dashboard.admin');
    // Dashboard User
    Route::get('dashboard/user',[UserController::class,'userDashboard'])->name('dashboard.user');

    // Dashboard Related Routes
    Route::get('booking/all',[BookingController::class,'index'])->name('booking.all');
    Route::get('booking/my',[BookingController::class,'userBookings'])->name('booking.my');
    Route::get('booking/add',[BookingController::class,'add'])->name('booking.add');
    Route::post('booking/save',[BookingController::class,'save'])->name('booking.save'); 
    Route::get('booking/{id}',[BookingController::class,'getBookingById'])->name('booking.edit');
    Route::post('booking/{id}',[BookingController::class,'updateBookingById'])->name('booking.update');
    Route::get('booking/delete/{id}',[BookingController::class,'viewDelete'])->name('booking.view.delete');
    Route::post('booking/delete/{id}',[BookingController::class,'delete'])->name('booking.delete');


    // Webpage Related Routes
    Route::get('webpage',[WebpageController::class,'index'])->name('webpage.index');
    Route::get('webpage/add',[WebpageController::class,'add'])->name('webpage.add');
    Route::post('webpage/save',[WebpageController::class,'save'])->name('webpage.save'); 
    Route::get('webpage/{id}',[WebpageController::class,'edit'])->name('webpage.edit');
    Route::post('webpage/{id}',[WebpageController::class,'update'])->name('webpage.update');
    Route::get('webpage/delete/{id}',[WebpageController::class,'viewDelete'])->name('webpage.view.delete');
    Route::post('webpage/delete/{id}',[WebpageController::class,'delete'])->name('webpage.delete');

    // User Related Routes
    Route::get('user',[UserController::class,'index'])->name('user');
    Route::get('user/add',[UserController::class,'add'])->name('user.add');
    Route::post('user/save',[UserController::class,'save'])->name('user.save'); 
    Route::get('user/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('user/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('user/delete/{id}',[UserController::class,'viewDelete'])->name('user.view.delete');
    Route::post('user/delete/{id}',[UserController::class,'delete'])->name('user.delete');

    // User Profile Related Routes
    Route::get('profile',[UserController::class,'getProfile'])->name('user.profile.get');
    Route::post('profile',[UserController::class,'saveProfile'])->name('user.profile.save');    


});

