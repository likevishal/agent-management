<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function() {
    return "Hello Laravel";
});

// Route::get('/agents',[AgentController::class,'index']);
// Route::get('/agents/create',[AgentController::class,'create']);
// Route::post('/agents/store',[AgentController::class,'store']);

// Route::get('/agents/edit/{id}',[AgentController::class,'edit']);
// Route::post('/agents/update/{id}',[AgentController::class,'update']);
// Route::get('/agents/delete/{id}',[AgentController::class,'destroy']);

Route::resource('agents', AgentController::class);