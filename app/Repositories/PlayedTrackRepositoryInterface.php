<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

use App\Repositories\Eloquent\PlayedTrackRepository;

use App\Models\PlayedTrack;

interface PlayedTrackRepositoryInterface 
{
    public function today();

    public function all($results = null);

    public function calculateListeningTime($timeFrame);

    public function getTopTracks($limit);
}
