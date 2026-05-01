<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // When running in production (e.g. on Render), force generated URLs
        // to use HTTPS. This stops the browser from blocking CSS/JS as
        // mixed content. Locally we leave it alone so http://portfolio.test
        // continues to work.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
