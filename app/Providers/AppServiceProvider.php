<?php

namespace App\Providers;

use App\Repositories\CategoryInterface;
use App\Repositories\CategoryRepository;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            PlacetoPay::class,
            function () {
                return new PlacetoPay(config('services.placetopay'));
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind(CategoryInterface::class, CategoryRepository::class);
    }
}
