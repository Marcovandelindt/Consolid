<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\Session;

use App\Services\MusicService;


class MusicGetRecentTracksController extends Controller 
{
    protected $musicService;

    /**
     * Constructor
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->musicService = new MusicService;
    }

    /**
     * Add the recent tracks
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(): RedirectResponse
    {
        $api = new SpotifyWebAPI();   
        $api->setAccessToken(Auth::user()->spotify_access_token);

        $tracks = $api->getMyRecentTracks(['limit' => 50]);

        if (!empty($tracks)) {
           $this->musicService->addTracks($tracks, $api);
        }

        return redirect()->route('music');
    }
}