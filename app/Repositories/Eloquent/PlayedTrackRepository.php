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
     * Calculate the listening time
     * 
     * @param string $timeFrame
     */
    public function calculateListeningTime($timeFrame)
    {
        $playedTracks = [];

        switch ($timeFrame) {
            case 'daily':
                $playedTracks = $this->today();
                break;
            case 'total':
                $playedTracks = $this->all();
                break;
            default:
                $playedTracks = $this->today();
                break;
        }

        return $this->playedTrackService->calculateListeningTime($playedTracks);
    }

    /**
     * Get all played tracks
     * @param $results
     */
    public function all($results = null)
    {
        if (is_numeric($results)) {
            $tracks = PlayedTrack::orderBy('played_at', 'DESC')->paginate($results);
        } else {
            $tracks = PlayedTrack::all();
        }

        return $tracks;
    }
}