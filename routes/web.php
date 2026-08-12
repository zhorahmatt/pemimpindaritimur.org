<?php

use App\Exports\HpiExport;
use App\Exports\IlmuKeuanganExport;
use App\Exports\MinautExport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
        Route::resource('/galleries', \App\Http\Controllers\Admin\GalleryController::class, ['as' => 'admin']);
        Route::resource('/activities', \App\Http\Controllers\Admin\ActivityController::class, ['as' => 'admin']);
        Route::resource('/programs', \App\Http\Controllers\Admin\ProgramController::class, ['as' => 'admin']);
        Route::resource('/blogs', \App\Http\Controllers\Admin\BlogController::class, ['as' => 'admin']);
        Route::resource('/testimonials', \App\Http\Controllers\Admin\TestimonialController::class, ['as' => 'admin']);
        Route::resource('/partners', \App\Http\Controllers\Admin\PartnerController::class, ['as' => 'admin']);
        Route::resource('/profile', \App\Http\Controllers\Admin\ProfileController::class, ['as' => 'admin']);
        Route::resource('/user', \App\Http\Controllers\Admin\UserController::class, ['as' => 'admin']);
    });
});

Route::get('/', \App\Http\Controllers\User\HomeController::class)->name('user.home');
Route::get('/activities', \App\Http\Controllers\User\ActivityController::class)->name('user.activity');
Route::get('/activities/{slug}', [\App\Http\Controllers\User\ActivityController::class, 'show'])->name('user.activity.show');
Route::get('/programs', \App\Http\Controllers\User\ProgramController::class)->name('user.program');
Route::get('/programs/{slug}', [\App\Http\Controllers\User\ProgramController::class, 'show'])->name('user.program.show');
Route::get('/blogs', \App\Http\Controllers\User\BlogController::class)->name('user.blog');
Route::get('/blogs/{slug}', [\App\Http\Controllers\User\BlogController::class, 'show'])->name('user.blog.show');
Route::get('/galleries', \App\Http\Controllers\User\GalleryController::class)->name('user.gallery');

// Lainnya
Route::get('/ilmu-keuangan', \App\Http\Controllers\User\OtherController::class)->name('user.other');
Route::post('/ilmu-keuangan', [\App\Http\Controllers\User\OtherController::class, 'store'])->name('user.other.store');
Route::get('/ilmu-keuangan/dashboard', [\App\Http\Controllers\User\OtherController::class, 'show'])->name('user.other.show');
Route::put('/ilmu-keuangan/dashboard/{data}', [\App\Http\Controllers\User\OtherController::class, 'update'])->name('user.other.update');
Route::delete('/ilmu-keuangan/dashboard/{data}', [\App\Http\Controllers\User\OtherController::class, 'destroy'])->name('user.other.destroy');
Route::get('/ilmu-keuangan/dashboard/export', function () {
    return Excel::download(new \App\Exports\IlmuKeuanganExport, 'ilmu_keuangan.xlsx');
})->name('user.other.export');

//minaut-indonesia
Route::get('/minaut-indonesia', [\App\Http\Controllers\User\OtherController::class, 'getMinaut'])->name('minaut.index');
Route::post('/minaut-indonesia', [\App\Http\Controllers\User\OtherController::class, 'registNewMinaut'])->name('minaut.index');
Route::get('/minaut-indonesia/dashboard', [\App\Http\Controllers\User\OtherController::class, 'showDashboardMinaut'])->name('minaut.show');
Route::put('/minaut-indonesia/dashboard/{data}', [\App\Http\Controllers\User\OtherController::class, 'updateDashboardMinaut'])->name('minaut.update');
Route::delete('/minaut-indonesia/dashboard/{data}', [\App\Http\Controllers\User\OtherController::class, 'destroyDashboardMinaut'])->name('minaut.destroy');
Route::get('/minaut-indonesia/dashboard/export', function () {
    return Excel::download(new MinautExport, 'minaut.xlsx');
})->name('minaut.export');

//hpi
Route::get('/hpi', [\App\Http\Controllers\User\OtherController::class, 'getHpi'])->name('hpi.index');
Route::post('/hpi', [\App\Http\Controllers\User\OtherController::class, 'registNewHpi'])->name('hpi.index');
Route::middleware('auth')->group(function () {
    Route::get('/hpi/dashboard', [\App\Http\Controllers\User\OtherController::class, 'showDashboardHpi'])->name('hpi.show');
    Route::put('/hpi/dashboard/{data}', [\App\Http\Controllers\User\OtherController::class, 'updateDashboardHpi'])->name('hpi.update');
    Route::delete('/hpi/dashboard/{data}', [\App\Http\Controllers\User\OtherController::class, 'destroyDashboardHpi'])->name('hpi.destroy');
    Route::get('/hpi/dashboard/export', function () {
        return Excel::download(new HpiExport, 'hpi.xlsx');
    })->name('hpi.export');
});