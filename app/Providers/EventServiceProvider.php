<?php

namespace App\Providers;

use App\Events\ProductCreated;
use App\Events\ProductUpdate;
use App\Http\Controllers\UserController;
use App\Listeners\AddAuthorToProduct;
use App\Listeners\AddAuthorToProductUpdate;
use App\Listeners\LogProductActions;
use App\Listeners\LogProductUpdateActions;
use App\Listeners\LogProductUpdateActionsActions;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProductCreated::class =>[
            LogProductActions::class,
            AddAuthorToProduct::class,
        ],
        ProductUpdate::class =>[
            LogProductUpdateActions::class,
            AddAuthorToProductUpdate::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
