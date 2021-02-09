<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Repositories\PlayedTrackRepositoryInterface;
use App\Repositories\AlbumRepositoryInterface;
use App\Repositories\ArtistRepositoryInterface;

use App\Services\PlayedTrackService;

class MusicLibraryController extends Controller
{
    private $playedTrackRepository;
    private $albumRepository;
    private $artistRepository;
    private $playedTrackService;

    /**
     * Constructor
     */
    public function __construct(PlayedTrackRepositoryInterface $playedTrackRepository, AlbumRepositoryInterface $albumRepository, ArtistRepositoryInterface $artistRepository, PlayedTrackService $playedTrackService)
    {
        $this->middleware('auth');

        $this->playedTrackRepository = $playedTrackRepository;
        $this->albumRepository       = $albumRepository;
        $this->artistRepository      = $artistRepository;
        $this->playedTrackService    = $playedTrackService;
    }

    /**
     * Show the library view
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $data = [];

        if (empty($request->from) && empty($request->range)) {
            
            // Get data since start
            $data = [
                'title'                 => 'Library',
                'tracks'                => $this->playedTrackRepository->all(),
                'albums'                => $this->albumRepository->all(),
                'artists'               => $this->artistRepository->all(),
                'listeningTime'         => $this->playedTrackRepository->calculateListeningTime('total'),
                'paginatedPlayedTracks' => $this->playedTrackRepository->all(25),
                'averagePlaysPerDay'    => $this->playedTrackRepository->calculateAveragePlays('total'),
                'yearlyTrackCount'      => $this->playedTrackRepository->getPlayedTracksCount('yearly'),
            ];

        } elseif (!empty($request->from) && $request->range == 'year') {

            // Get data from selected year
            $data = [
                'tracks'                => $this->playedTrackRepository->all(),
                'albums'                => $this->albumRepository->all(),
                'artists'               => $this->artistRepository->all(),
                'listeningTime'         => $this->playedTrackRepository->calculateListeningTime('total'),
                'paginatedPlayedTracks' => $this->playedTrackRepository->all(25),
            ];

        } elseif (!empty($request->from) && $request->range == 'month') {

            // Get data from selected month
            $data = [
                'tracks'                => $this->playedTrackRepository->all(),
                'albums'                => $this->albumRepository->all(),
                'artists'               => $this->artistRepository->all(),
                'listeningTime'         => $this->playedTrackRepository->calculateListeningTime('total'),
                'paginatedPlayedTracks' => $this->playedTrackRepository->all(25),
            ];

        } elseif (!empty($request->from) && $request->range == 'day') {
            
            // Get data from selected day
            $data = [
                'tracks'                => $this->playedTrackRepository->all(),
                'albums'                => $this->albumRepository->all(),
                'artists'               => $this->artistRepository->all(),
                'listeningTime'         => $this->playedTrackRepository->calculateListeningTime('total'),
                'paginatedPlayedTracks' => $this->playedTrackRepository->all(25),
            ];
        }

        return view('music.library')->with($data);
    }
}
