<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

use App\Repositories\Eloquent\ArtistRepository;

use App\Models\PlayedTrack;

interface ArtistRepositoryInterface 
{
    public function today();

    public function all();

    public function getTopArtists($limit);

    public function getUniquePlayedArtists($timeFrame, $paginatedResults = null);
}
