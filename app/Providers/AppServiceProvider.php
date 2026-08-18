<?php

namespace App\Providers;

use App\Contracts\HpiRegistrationSheet;
use App\Services\GoogleSheetsHpiRegistrationSheet;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(HpiRegistrationSheet::class, GoogleSheetsHpiRegistrationSheet::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
