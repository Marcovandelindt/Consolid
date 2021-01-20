<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Repositories\AlbumRepositoryInterface;
use App\Repositories\PlayedTrackRepositoryInterface;
use App\Repositories\ArtistRepositoryInterface;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    private $playedTrackRepository;
    private $albumRepository;
    private $artistRepository;

    /**
     * Constructor
     * 
     */
    public function __construct(PlayedTrackRepositoryInterface $playedTrackRepository, AlbumRepositoryInterface $albumRepository, ArtistRepositoryInterface $artistRepository)
    {
        $this->middleware('auth');

        $this->playedTrackRepository = $playedTrackRepository;
        $this->albumRepository       = $albumRepository;
        $this->artistRepository      = $artistRepository;
    }

    /**
     * Show the index view
     * 
     */
    public function index()
    {
        return view('music.index', [
            'title'         => 'Music',
            'page'          => 'music',
            'playedTracks'  => $this->playedTrackRepository->today(),
            'playedAlbums'  => $this->albumRepository->today(),
            'playedArtists' => $this->artistRepository->today(),
            'listeningTime' => $this->playedTrackRepository->listeningTimeToday(),
        ]);
    }
}
