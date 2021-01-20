<?php

namespace App\Services;

use App\Models\PlayedTrack;
use App\Models\Track;

class PlayedTrackService 
{
    /**
     * Save a played track
     * 
     * @param object $data
     * @param \App\Models\Track $track
     * 
     * @return void
     */
    public function savePlayedTrack($data, Track $track): void 
    {
        $playedTrack = new PlayedTrack;

        $playedTrack->track_id    = $track->id;
        $playedTrack->played_from = $data->context->type;
        $playedTrack->played_at   = strtotime($data->played_at);
        $playedTrack->played_date = date('Y-m-d', strtotime($data->played_at));

        $playedTrack->save();
    }
}