<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use App\Models\Sanctum\PersonalAccessToken;

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
        class_alias(PersonalAccessToken::class, \Laravel\Sanctum\PersonalAccessToken::Class);
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
