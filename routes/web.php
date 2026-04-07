<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgentAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function() {
    return "Hello Laravel";
});

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