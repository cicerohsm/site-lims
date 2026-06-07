<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if ($this->app->runningInConsole()) {
            return;
        }

        $request = $this->app['request'];
        $forwardedProto = $request->headers->get('x-forwarded-proto');
        $isRailwayHost = str_ends_with($request->getHost(), '.up.railway.app');

        if ($forwardedProto === 'https' || $isRailwayHost || $this->app->environment('production')) {
            URL::forceRootUrl('https://'.$request->getHost());
            URL::forceScheme('https');
        }
    }
}
