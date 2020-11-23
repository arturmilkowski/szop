<?php

namespace App\Providers;

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
        'App\Events\OrderPlacedWithRegistration' => [
            'App\Listeners\WithRegistration\SendEmailOrderPlaced',
            'App\Listeners\WithRegistration\SetSessionOrderPlaced',
            'App\Listeners\DecrementItem',
            'App\Listeners\SendOrderNotification',
        ],
        'App\Events\OrderPlacedWithoutRegistration' => [
            'App\Listeners\WithoutRegistration\SendEmailOrderPlaced',
            'App\Listeners\WithoutRegistration\SetSessionOrderPlaced',
            'App\Listeners\DecrementItem',
            'App\Listeners\SendOrderNotification',
        ],
        'App\Events\ChangeOrderStatus' => [
            'App\Listeners\SendEmailChangeOrderStatus',
        ],
        'App\Events\EditProduct' => [
            'App\Listeners\ClearCache',
        ],
        'App\Events\EditPost' => [
            'App\Listeners\Blog\CreatePost',
        ],
        'App\Events\DeletePost' => [
            'App\Listeners\ClearCache',
        ],
        'App\Events\CommentAdded' => [
            'App\Listeners\Blog\SendEmailCommentAdded',
        ],
        'App\Events\CommentApproved' => [
            'App\Listeners\Blog\ClearPostCache',
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
