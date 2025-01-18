<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PragmaRX\Google2FA\Google2FA;

class Google2FAServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('pragmarx.google2fa', function ($app) {
            return new Google2FA();
        });
    }
}
