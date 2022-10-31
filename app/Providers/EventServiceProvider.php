<?php

namespace App\Providers;

use App\Models\SparePart;
use App\Models\SparePartProduction;
use App\Models\UserLog;
use App\Observers\SparePartObserver;
use App\Observers\SparePartProductionObserver;
use App\Observers\UserLogObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
    //    UserLog::observe(UserLogObserver::class);
       SparePart::observe(SparePartObserver::class);
       SparePartProduction::observe(SparePartProductionObserver::class);
    }
}
