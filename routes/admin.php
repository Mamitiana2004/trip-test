<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

Route::get("/login", [AuthController::class,"showLogin"])->name("admin.login");
Route::post("/login",[AuthController::class,"login"]);
Route::post("/logou",[AuthController::class,"logout"]);


Route::resource("/destination",DestinationController::class);
