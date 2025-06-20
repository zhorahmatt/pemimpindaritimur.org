<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return \Inertia\Inertia::render('User/Home/Index');
});

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
        Route::resource('/blogs', \App\Http\Controllers\Admin\BlogController::class, ['as' => 'admin']);
        Route::resource('/testimonials', \App\Http\Controllers\Admin\TestimonialController::class, ['as' => 'admin']);
        Route::resource('/partners', \App\Http\Controllers\Admin\PartnerController::class, ['as' => 'admin']);
        Route::resource('/profile', \App\Http\Controllers\Admin\ProfileController::class, ['as' => 'admin']);
        Route::resource('/user', \App\Http\Controllers\Admin\UserController::class, ['as' => 'admin']);
    });
});
