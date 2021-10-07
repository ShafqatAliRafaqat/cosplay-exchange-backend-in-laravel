<?php

namespace App\Providers;

use App\Events\CostumeRequestStatusEvent;
use App\Events\MemberSubscribedEvent;
use App\Events\MemberUnsubscribedEvent;
use App\Events\NewCostumeEvent;
use App\Events\NewCostumeRequestEvent;
use App\Events\NewCostumeStatusEvent;
use App\Events\NewMemberRegisteredEvent;
use App\Events\ShippingDeliveredEvent;
use App\Events\ShippingDetailsEvent;
use App\Listeners\CostumeRequestStatusListener;
use App\Listeners\MemberSubscribedAdminNotificationListener;
use App\Listeners\MemberSubscribedListener;
use App\Listeners\MemberUnsubscribedAdminNotification;
use App\Listeners\MemberUnsubscribedListener;
use App\Listeners\NewCostumeListener;
use App\Listeners\NewCostumeRequestListener;
use App\Listeners\NewCostumeStatusListener;
use App\Listeners\NewMemberAdminNotificationListener;
use App\Listeners\NewMemberRegisteredListener;
use App\Listeners\ShippingDeliveredListener;
use App\Listeners\ShippingDetailsListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        NewMemberRegisteredEvent::class=>[
          NewMemberRegisteredListener::class,
        ],
        MemberSubscribedEvent::class=>[
            MemberSubscribedListener::class,
        ],
        MemberUnsubscribedEvent::class=>[
            MemberUnsubscribedListener::class,
        ],
        NewCostumeEvent::class=>[
            NewCostumeListener::class,
        ],
        NewCostumeStatusEvent::class=>[
            NewCostumeStatusListener::class,
        ],
        NewCostumeRequestEvent::class=>[
            NewCostumeRequestListener::class,
        ],
        CostumeRequestStatusEvent::class=>[
            CostumeRequestStatusListener::class,
        ],
        ShippingDetailsEvent::class=>[
            ShippingDetailsListener::class,
        ],
        ShippingDeliveredEvent::class=>[
            ShippingDeliveredListener::class,
        ],
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
