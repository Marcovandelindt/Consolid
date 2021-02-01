<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use App\Repositories\PlayedTrackRepositoryInterface;
use App\Services\PlayedTrackService;

use App\Models\PlayedTrack;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

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
     * @param bool   $formatted
     */
    public function calculateListeningTime($timeFrame, $formatted = false)
    {
        $playedTracks = [];

        switch ($timeFrame) {
            case 'daily':
                $playedTracks = $this->today();
                break;
            case 'last-week':
                $playedTracks = $this->getWeekly(Carbon::today()->startOfWeek()->subDays(7)->format('Y-m-d'), Carbon::today()->endOfWeek()->subDays(7)->format('Y-m-d'));
                break;
            case '-2 week':
                $playedTracks = $this->getWeekly(Carbon::today()->startOfWeek()->subDays(14)->format('Y-m-d'), Carbon::today()->endOfWeek()->subDays(14)->format('Y-m-d'));
                break;
            case 'total':
                $playedTracks = $this->all();
                break;
            default:
                $playedTracks = $this->today();
                break;
        }

        return $this->playedTrackService->calculateListeningTime($playedTracks, $formatted);
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
    
    /**
     * Get top tracks based
     * 
     * @param $limit
     */
    public function getTopTracks($limit)
    {
        return PlayedTrack::select('*', DB::raw('count(*) as total'))
            ->groupBy('track_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit($limit)
            ->get();
    }

    /**
     * Get all tracks for a certain week
     * 
     * @param string $startDate
     * @param string $endDate
     * 
     * @return \EloquentCollection
     */
    public function getWeekly($startDate, $endDate)
    {
        return PlayedTrack::select('*')
            ->where('played_date', '>=', $startDate)
            ->where('played_date', '<=', $endDate)
            ->get();
    }
}