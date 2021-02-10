<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Repositories\PlayedTrackRepositoryInterface;

class MusicLibraryTracksController extends Controller
{
    protected $playedTrackRepository;

    /**
     * Constructor
     * 
     */
    public function __construct(PlayedTrackRepositoryInterface $playedTrackRepository)
    {
        $this->middleware('auth');

        $this->playedTrackRepository = $playedTrackRepository;
    }

    /**
     * Index action
     * 
     * @param \Illuminate\Http\Request $_REQUEST
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $data = [
            'title'                 => 'Library - Tracks',
            'requestType'           => 'tracks',
            'uniqueTracks'          => $this->playedTrackRepository->getUniquePlayedTracks('total'),
            'uniqueTracksPaginated' => $this->playedTrackRepository->getUniquePlayedTracks('total', 50),
        ];

        return view('music.library.tracks')->with($data);
    }
}
