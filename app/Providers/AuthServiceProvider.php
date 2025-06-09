<?php

namespace App\Providers;

use App\Models\Review;
use App\Models\Watchlist;
use App\Policies\ReviewPolicy;
use App\Policies\WatchlistPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Review::class => ReviewPolicy::class,
        Watchlist::class => WatchlistPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}