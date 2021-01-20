<?php

namespace App\Providers;

use App\Repositories\Eloquent\PlayedTrackRepository;
use App\Repositories\PlayedTrackRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PlayedTrackRepositoryInterface::class, PlayedTrackRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
