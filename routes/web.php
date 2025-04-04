<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PortfolioController::class,'welcome'])->name('portfolio');
Route::get('/projects',[PortfolioController::class,'projects'])->name('projects');
Route::get('/posts',[PortfolioController::class,'posts'])->name('posts');

Route::middleware('auth')->controller(PortfolioController::class)->group(function(){
    Route::post('/updateskills','updateskill')->name('skills.update');
});

Route::get('/portfolio', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('auth')->middleware('auth')->controller(BackendController::class)->group(function () {
    Route::get('/aboutMe', 'aboutMe')->name('portfolio.aboutMe');
    Route::post('/aboutMe','store')->name('portfolio.store');
    Route::get('/projects','projects')->name('portfolio.projects');
    Route::post('/projects','submitproject')->name('portfolio.submitproject');
    Route::get('/blogs','blogs')->name('portfolio.blogs');
    Route::get('/create_blog','addblog')->name('portfolio.addblog');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/getscreenshot',[PortfolioController::class,'getScreenshot']);
require __DIR__.'/auth.php';
