<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

use App\Services\MusicService;
use App\Repositories\PlayedTrackRepositoryInterface;

class MusicWeeklyReportController extends Controller
{
    private $musicService;
    private $playedTrackRepository;

    /**
     * Constructor
     */
    public function __construct(PlayedTrackRepositoryInterface $playedTrackRepository)
    {
        $this->middleware('auth');

        $this->musicService = new musicService;

        $this->playedTrackRepository = $playedTrackRepository;
    }   

    /**
     * Show weekly report view
     */
    public function index(): View
    {
        $startDate = $this->musicService->getStartDateForReport('weekly');
        $endDate   = $this->musicService->getEndDateForReport('weekly');

        $weeklyReportData = $this->musicService->generateListeningReport($startDate, $endDate);

        $data = [
            'title'              => 'Weekly Report',
            'startDateFormatted' => Carbon::parse($startDate)->toFormattedDateString(),
            'endDateFormatted'   => Carbon::parse($endDate)->toFormattedDateString(),
            'weeklyReportData'   => $weeklyReportData,
        ];

        return view('music.reports.weekly')->with($data);
    }
}
