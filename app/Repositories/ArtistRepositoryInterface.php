<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

use App\Repositories\Eloquent\ArtistRepository;

use App\Models\PlayedTrack;

interface ArtistRepositoryInterface 
{
    public function today();
}
