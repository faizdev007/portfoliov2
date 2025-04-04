<?php

use App\Http\Controllers\v1\ApiController as V1ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->controller(V1ApiController::class)->group(function(){
    Route::get('/educationldata','educationldata')->name('basic.education.data');
    Route::get('/skills','skillsearch')->name('skill.search');
});
