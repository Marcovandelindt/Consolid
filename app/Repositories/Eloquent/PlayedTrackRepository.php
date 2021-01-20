<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Collection;

use App\Repositories\PlayedTrackRepositoryInterface;

use App\Models\PlayedTrack;

class PlayedTrackRepository implements PlayedTrackRepositoryInterface
{
    /**
     * Get all played tracks from the current date
     * 
     * @return Collection
     */
    public function today(): Collection 
    {
        return PlayedTrack::orderBy('played_at')
            ->where('played_date', date('Y-m-d')
            )->get();
    }
}