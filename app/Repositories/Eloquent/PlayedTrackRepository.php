<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Collection;

use App\Repositories\PlayedTrackRepositoryInterface;
use App\Services\PlayedTrackService;

use App\Models\PlayedTrack;

class PlayedTrackRepository implements PlayedTrackRepositoryInterface
{
    protected $playedTrackService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->playedTrackService = new PlayedTrackService;
    }

    /**
     * Get all played tracks from the current date
     * 
     * @return Collection
     */
    public function today(): Collection 
    {
        return PlayedTrack::orderBy('played_at', 'DESC')
            ->where('played_date', date('Y-m-d')
            )->get();
    }

    /**
     * Get the total listening time today
     * 
     * @return int
     */
    public function listeningTimeToday() 
    {
        $playedTracks = PlayedTrack::where('played_date', date('Y-m-d'))
            ->get();
        
       return $this->playedTrackService->calculateListeningTime($playedTracks);
    }

    /**
     * Get all played tracks
     */
    public function all()
    {
        return PlayedTrack::all();
    }
}