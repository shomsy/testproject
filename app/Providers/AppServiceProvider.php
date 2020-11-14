<?php

namespace App\Providers;

use App\Http\Resources\UserResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        UserResource::withoutWrapping();
        Schema::defaultStringLength(191);
    }
}
