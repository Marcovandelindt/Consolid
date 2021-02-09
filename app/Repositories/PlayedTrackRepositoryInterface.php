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

    public function getWeekly($startDate, $endDate);

    public function getTrackCountPerTimeLastWeek();

    public function getByDatesAndTimes($startDate, $endDate, $startingTime, $endingTime);

    public function calculateAveragePlays($timeFrame, $startDate = null);

    public function getPlayedTracksCount($timeFrame, $startDate = null);

    public function getByDates($startDate, $endDate);
}
