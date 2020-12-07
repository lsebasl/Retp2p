<?php

namespace App\Providers;

use App\Http\View\Composer\CategoryComposer;
use App\Http\View\Composer\MarkComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot():void
    {
        View::composer(
            ['products.create','product__form'],
            MarkComposer::class
        );
        View::composer(
            ['products.create','product__form'],
            CategoryComposer::class
        );
        View::composer(
            ['products.reports'],
            CategoryComposer::class
        );
        View::composer(
            ['products.reports'],
            MarkComposer::class
        );
        View::composer(
            ['products.edit','product__form'],
            MarkComposer::class
        );
        View::composer(
            ['products.edit','product__form'],
            CategoryComposer::class
        );
        View::composer(
            ['products.index','__search_in_products'],
            CategoryComposer::class
        );
        View::composer(
            ['products.index','__search_in_products'],
            MarkComposer::class
        );
        View::composer(
            ['store.goods','__search_products'],
            CategoryComposer::class
        );
        View::composer(
            ['store.layout.layout','__sidebar_goods'],
            CategoryComposer::class
        );
        View::composer(
            ['stocks.index','__form_search_products'],
            CategoryComposer::class
        );
        View::composer(
            ['stocks.index','__form_search_products'],
            MarkComposer::class
        );
        View::composer(
            ['payment.history','__form_search_history'],
            CategoryComposer::class
        );
    }
}
