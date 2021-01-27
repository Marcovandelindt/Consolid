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
        $totalPlayedTracks  = $this->playedTrackRepository->all();
        $totalPlayedAlbums  = $this->albumRepository->all();
        $totalPlayedArtists = $this->artistRepository->all();
        $totalListeningTime = $this->playedTrackRepository->listeningTimeTotal();

        $data = [
            'title'              => 'Library',
            'totalPlayedTracks'  => $totalPlayedTracks,
            'totalPlayedAlbums'  => $totalPlayedAlbums,
            'totalPlayedArtists' => $totalPlayedArtists,
            'totalListeningTime' => $totalListeningTime,
        ];

        return view('music.library')->with($data);
    }
}
