<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgentAuthController;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminForgotPasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function() {
    return "Hello Laravel";
});

// ADMIN LOGIN ROUTE START 

//login
Route::get('/admin/login',[AdminAuthController::class,'showLogin'])->name('admin.login');
Route::post('/admin/login',[AdminAuthController::class,'login']);

//protected

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard',function(){
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('agents', AgentController::class);
});


//logout
Route::post('/admin/logout',[AdminAuthController::class,'logout']);

//forgot password
Route::get('admin/forgot-password',[AdminForgotPasswordController::class,'showForgotForm']);
Route::post('admin/forgot-password',[AdminForgotPasswordController::class,'sendResetLink'])->name('admin.forgot');

//reset password
Route::get('/admin/reset-password/{token}',[AdminForgotPasswordController::class,'showResetForm']);
Route::post('/admin/reset-password',[AdminForgotPasswordController::class,'resetPassword'])->name('admin.reset');



// ADMIN LOGIN ROUTE END

Route::get('/agent/login',[AgentAuthController::class,'showLogin'])->name('agent.login');
Route::post('/agent/login',[AgentAuthController::class,'login']);

// AGENT ROUTE START
    Route::middleware('auth:agent')->prefix('agent')->name('agent.')->group(function(){
        Route::get('/dashboard',function(){
            return view('agent.dashboard');
        })->name('dashboard');
    });
// AGENT ROUTE END


Route::post('/agent/logout',[AgentAuthController::class,'logout']);
