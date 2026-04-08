<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgentAuthController;

use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function() {
    return "Hello Laravel";
});

// ADMIN LOGIN ROUTE START 

//login
Route::get('/admin/login',[AdminAuthController::class,'showLogin']);
Route::post('/admin/login',[AdminAuthController::class,'login']);

//protected

Route::middleware('auth:admin')->group(function(){
    Route::get('/admin/dashboard',function(){
        return "Admin dashboard";
    });
});


//logout 

Route::post('/admin/logout',[AdminAuthController::class,'logout']);

// ADMIN LOGIN ROUTE END

Route::get('/agent/login',[AgentAuthController::class,'showLogin']);
Route::post('/agent/login',[AgentAuthController::class,'login']);

Route::get('/agent/dashboard',function(){
    return "Agent Dashboard";
})->middleware('auth:agent');


Route::post('/agent/logout',[AgentAuthController::class,'logout']);

// Route::get('/agents',[AgentController::class,'index']);
// Route::get('/agents/create',[AgentController::class,'create']);
// Route::post('/agents/store',[AgentController::class,'store']);

// Route::get('/agents/edit/{id}',[AgentController::class,'edit']);
// Route::post('/agents/update/{id}',[AgentController::class,'update']);
// Route::get('/agents/delete/{id}',[AgentController::class,'destroy']);

Route::resource('agents', AgentController::class);