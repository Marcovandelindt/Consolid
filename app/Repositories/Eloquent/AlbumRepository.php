<?php

namespace App\Repositories\Eloquent;

use App\Models\Album;
use App\Models\PlayedTrack;
use App\Repositories\AlbumRepositoryInterface;
use App\Repositories\PlayedTrackRepository;

class AlbumRepository implements AlbumRepositoryInterface 
{
    /**
     * Get all played albums today
     */
    public function today()
    {
        $playedTracks = PlayedTrack::where('played_date', date('Y-m-d'))->get();

        $albums = [];
        foreach ($playedTracks as $playedTrack) {
            $albums[$playedTrack->track->album->id] = $playedTrack->track->album;
        }

        return $albums;
    }
}