<?php

use App\Exports\IlmuKeuanganExport;
use App\Exports\MinautExport;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\AcceptInvitationController;
use App\Http\Controllers\User\OtherController;
use App\Http\Controllers\User\PeakPerformanceController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)
        ->middleware('permission:admin.dashboard.view')
        ->name('admin.dashboard');

    Route::middleware('permission:content.galleries.view')->group(function () {
        Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class, ['as' => 'admin']);
    });

    Route::middleware('permission:content.activities.view')->group(function () {
        Route::resource('activities', \App\Http\Controllers\Admin\ActivityController::class, ['as' => 'admin']);
    });

    Route::middleware('permission:content.programs.view')->group(function () {
        Route::resource('programs', \App\Http\Controllers\Admin\ProgramController::class, ['as' => 'admin']);
    });

    Route::middleware('permission:content.blogs.view')->group(function () {
        Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class, ['as' => 'admin']);
    });

    Route::middleware('permission:content.testimonials.view')->group(function () {
        Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class, ['as' => 'admin']);
    });

    Route::middleware('permission:content.partners.view')->group(function () {
        Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class, ['as' => 'admin']);
    });

    Route::middleware('permission:foundation-profile.view')->group(function () {
        Route::resource('profile', \App\Http\Controllers\Admin\ProfileController::class, ['as' => 'admin']);
    });

    Route::middleware('permission:admin.users.view')->group(function () {
        Route::get('users', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::get('users/invitations', [AdminUserController::class, 'invitations'])->name('admin.user.invitations');
        Route::get('users/create', [AdminUserController::class, 'create'])->middleware('permission:admin.users.invite')->name('admin.user.create');
        Route::post('users', [AdminUserController::class, 'store'])->middleware('permission:admin.users.invite')->name('admin.user.store');
        Route::get('users/{user}/edit', [AdminUserController::class, 'edit'])->middleware('permission:admin.users.update')->name('admin.user.edit');
        Route::put('users/{user}', [AdminUserController::class, 'update'])->middleware('permission:admin.users.update')->name('admin.user.update');
        Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->middleware('permission:admin.users.delete')->name('admin.user.destroy');
        Route::post('users/{user}/roles', [AdminUserController::class, 'syncRoles'])->middleware('permission:admin.users.assign-role')->name('admin.user.roles.sync');
        Route::post('users/invitations/{invitation}/resend', [AdminUserController::class, 'resendInvitation'])->middleware('permission:admin.users.invite')->name('admin.user.invitations.resend');
        Route::delete('users/invitations/{invitation}', [AdminUserController::class, 'revokeInvitation'])->middleware('permission:admin.users.invite')->name('admin.user.invitations.revoke');
    });

    Route::middleware('permission:admin.roles.view')->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('admin.role.index');
        Route::get('roles/create', [RoleController::class, 'create'])->middleware('permission:admin.roles.create')->name('admin.role.create');
        Route::post('roles', [RoleController::class, 'store'])->middleware('permission:admin.roles.create')->name('admin.role.store');
        Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->middleware('permission:admin.roles.update')->name('admin.role.edit');
        Route::put('roles/{role}', [RoleController::class, 'update'])->middleware('permission:admin.roles.update')->name('admin.role.update');
        Route::delete('roles/{role}', [RoleController::class, 'destroy'])->middleware('permission:admin.roles.delete')->name('admin.role.destroy');
    });

    Route::get('account', [AccountController::class, 'edit'])->name('admin.account.edit');
    Route::put('account', [AccountController::class, 'update'])->name('admin.account.update');
});

Route::get('/', \App\Http\Controllers\User\HomeController::class)->name('user.home');
Route::get('/activities', \App\Http\Controllers\User\ActivityController::class)->name('user.activity');
Route::get('/activities/{slug}', [\App\Http\Controllers\User\ActivityController::class, 'show'])->name('user.activity.show');
Route::get('/programs', \App\Http\Controllers\User\ProgramController::class)->name('user.program');
Route::get('/programs/{slug}', [\App\Http\Controllers\User\ProgramController::class, 'show'])->name('user.program.show');
Route::get('/blogs', \App\Http\Controllers\User\BlogController::class)->name('user.blog');
Route::get('/blogs/{slug}', [\App\Http\Controllers\User\BlogController::class, 'show'])->name('user.blog.show');
Route::get('/galleries', \App\Http\Controllers\User\GalleryController::class)->name('user.gallery');

Route::get('/ilmu-keuangan', OtherController::class)->name('user.other');
Route::post('/ilmu-keuangan', [OtherController::class, 'store'])->name('user.other.store');
Route::get('/ilmu-keuangan/dashboard', [OtherController::class, 'show'])
    ->middleware(['auth', 'permission:registrations.ilmu-keuangan.view'])
    ->name('user.other.show');
Route::put('/ilmu-keuangan/dashboard/{data}', [OtherController::class, 'update'])
    ->middleware(['auth', 'permission:registrations.ilmu-keuangan.update'])
    ->name('user.other.update');
Route::delete('/ilmu-keuangan/dashboard/{data}', [OtherController::class, 'destroy'])
    ->middleware(['auth', 'permission:registrations.ilmu-keuangan.delete'])
    ->name('user.other.destroy');
Route::get('/ilmu-keuangan/dashboard/export', function () {
    return Excel::download(new IlmuKeuanganExport, 'ilmu_keuangan.xlsx');
})->middleware(['auth', 'permission:registrations.ilmu-keuangan.export'])->name('user.other.export');

Route::get('/peak-performance-program', PeakPerformanceController::class)->name('peak-performance');

Route::get('/minaut-indonesia', [OtherController::class, 'getMinaut'])->name('minaut.index');
Route::post('/minaut-indonesia', [OtherController::class, 'registNewMinaut'])->name('minaut.store');
Route::get('/minaut-indonesia/dashboard', [OtherController::class, 'showDashboardMinaut'])
    ->middleware(['auth', 'permission:registrations.minaut.view'])
    ->name('minaut.show');
Route::put('/minaut-indonesia/dashboard/{data}', [OtherController::class, 'updateDashboardMinaut'])
    ->middleware(['auth', 'permission:registrations.minaut.update'])
    ->name('minaut.update');
Route::delete('/minaut-indonesia/dashboard/{data}', [OtherController::class, 'destroyDashboardMinaut'])
    ->middleware(['auth', 'permission:registrations.minaut.delete'])
    ->name('minaut.destroy');
Route::get('/minaut-indonesia/dashboard/export', function () {
    return Excel::download(new MinautExport, 'minaut.xlsx');
})->middleware(['auth', 'permission:registrations.minaut.export'])->name('minaut.export');

Route::get('/invite/{token}', [AcceptInvitationController::class, 'show'])->name('invitation.show');
Route::post('/invite/{token}', [AcceptInvitationController::class, 'accept'])->name('invitation.accept');
