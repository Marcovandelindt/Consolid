<?php

namespace App\Repositories\Eloquent;

use App\Models\Album;
use App\Models\PlayedTrack;
use App\Repositories\ArtistRepositoryInterface;
use App\Repositories\PlayedTrackRepository;

class ArtistRepository implements ArtistRepositoryInterface 
{
    /**
     * Get all played albums today
     */
    public function today()
    {
        $playedTracks = PlayedTrack::where('played_date', date('Y-m-d'))->get();

        $artists = [];
        foreach ($playedTracks as $playedTrack) {
            foreach ($playedTrack->track->artists as $artist) {
                $artists[$artist->id] = $artist;
            }
        }

        return $artists;
    }
}