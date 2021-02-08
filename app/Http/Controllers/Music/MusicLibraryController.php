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
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $data = [
            'title'                 => 'Library',
            'tracks'                => $this->playedTrackRepository->all(),
            'albums'                => $this->albumRepository->all(),
            'artists'               => $this->artistRepository->all(),
            'listeningTime'         => $this->playedTrackRepository->calculateListeningTime('total'),
            'paginatedPlayedTracks' => $this->playedTrackRepository->all(25),
            'topTracks'             => $this->playedTrackRepository->getTopTracks(5),
            'topAlbums'             => $this->albumRepository->getTopAlbums(5),
            'topArtists'            => $this->artistRepository->getTopArtists(5),
            'averagePlays'          => $this->playedTrackRepository->calculateAveragePlays(),
        ]; 

        return view('music.library')->with($data);
    }
}
