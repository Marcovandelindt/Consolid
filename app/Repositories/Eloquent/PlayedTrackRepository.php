<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;

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

    public function getTrackCountPerTimeLastWeek()
    {
        // Set start and end date
        $startDate = Carbon::now()->startOfWeek()->subDays(7)->format('Y-m-d');
        $endDate   = Carbon::now()->endOfWeek()->subDays(7)->format('Y-m-d');

        // Set the starting hour of the day
        $startingTime = strtotime('00:00');

        // Create empty array to store tracks associated with time
        $trackTimes = [];

        // Loop through all the possible hours in a day
        for ($i = 0; $i < 24; $i++) {
            $endingTime = strtotime('+1 hour', $startingTime);
            $tracks     = $this->getByDatesAndTimes($startDate, $endDate, date('H:i', $startingTime), date('H:i', $endingTime));
            if (count($tracks) > 0) {
                foreach ($tracks as $track) {
                    $trackTimes[date('H:i', $startingTime)][] = $track;
                }
            } else {
                $trackTimes[date('H:i', $startingTime)] = [];
            }

            $startingTime = strtotime('+1 hour', $startingTime);
        }

        return $trackTimes;
    }

    public function getTrackCountPerTimeMonth()
    {
        $startDate = Carbon::now()->startOfYear()->format('Y-m-d');
        $endDate   = Carbon::now()->endOfYear()->format('Y-m-d');

        $trackDates = [];

        for ($i = 0; $i < 12; $i++) {
            $endingDate = Carbon::parse($startDate)->lastOfMonth()->format('Y-m-d');
            $tracks     = $this->getByDates($startDate, $endingDate);
            
            if (count($tracks) > 0) {
                foreach ($tracks as $track) {
                    $trackDates[$startDate][] = $track;
                }
            } else {
                $trackDates[$startDate] = [];
            }

            $startDate = Carbon::parse($endingDate)->addDay(1)->format('Y-m-d');            
        }

        return $trackDates;
    }

    public function getByDates($startDate, $endDate, )
    {
        return PlayedTrack::select('*')
            ->where('played_date', '>=', $startDate)
            ->where('played_date', '<=', $endDate)
            ->get();
    }

    public function getByDatesAndTimes($startDate, $endDate, $startingTime, $endingTime)
    {
        return PlayedTrack::select('*')
            ->where('played_date', '>=', $startDate)
            ->where('played_date', '<=', $endDate)
            ->where('time', '>=', $startingTime)
            ->where('time', '<=', $endingTime)
            ->get();
    }

    /**
     * Calculate the average listening time since the start
     */
    public function calculateAveragePlays()
    {
        $first  = PlayedTrack::all()->first(); 
        
        $start = Carbon::parse($first->played_date . ' ' . $first->time);
        $end   = Carbon::now();

        $difference = $start->diffInDays($end);

        return (int) round(count($this->all()) / $difference, 0);
    }
}