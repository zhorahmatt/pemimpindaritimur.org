<?php

namespace App\Providers;

use App\Models\Profile;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $profile_logo = Profile::first()->logo;
        Inertia::share([
            'profile_logo' => $profile_logo,
        ]);
    }
}
