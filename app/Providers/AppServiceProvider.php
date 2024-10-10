<?php

namespace App\Providers;

use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Repositories\ProviderRepository;
use App\Contracts\Services\SearchService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private const BINDS = [
        ProviderRepository::class => \App\Repositories\Eloquent\ProviderRepository::class,
        ProductRepository::class => \App\Repositories\Eloquent\ProductRepository::class,

        // Services
        SearchService::class => \App\Services\SearchService::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (self::BINDS as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
