<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Repositories\PlayedTrackRepositoryInterface;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    private $playedTrackRepository;

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
     * Show the index view
     * 
     */
    public function index()
    {
        return view('music.index', [
            'title' => 'Music',
            'page'  => 'music'
        ]);
    }
}
