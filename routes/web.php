<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

Route::get("/",[DestinationController::class,"getAll"]);
Route::get("/voir",[DestinationController::class,"voir"])->name("public.destination.show");


Route::get('/destinations', [DestinationController::class, 'apiIndex']);
Route::get('/destinations/{id}', [DestinationController::class, 'apiShow']);
Route::get('/destination', [DestinationController::class, 'apiShowName']);
