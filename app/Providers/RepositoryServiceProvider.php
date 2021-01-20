<?php

namespace App\Providers;

use App\Repositories\AlbumRepositoryInterface;
use App\Repositories\ArtistRepositoryInterface;
use App\Repositories\Eloquent\AlbumRepository;
use App\Repositories\Eloquent\ArtistRepository;
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
        $this->app->bind(AlbumRepositoryInterface::class, AlbumRepository::class);
        $this->app->bind(ArtistRepositoryInterface::class, ArtistRepository::class);
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
