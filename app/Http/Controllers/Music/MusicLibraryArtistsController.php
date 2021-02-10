<?php

namespace App\Http\Controllers\Music;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Http\Controllers\Controller;
use App\Repositories\ArtistRepositoryInterface;

class MusicLibraryArtistsController extends Controller
{
    private $artistRepository;

    /**
     * Constructor
     * 
     */
    public function __construct(ArtistRepositoryInterface $artistRepository)
    {
        $this->middleware('auth');

        $this->artistRepository = $artistRepository;
    }

    /**
     * Index action
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = [
            'title'            => 'Library - Artists',
            'requestType'      => 'artists',
            'artists'          => $this->artistRepository->getUniquePlayedArtists('total'),
            'artistsPaginated' => $this->artistRepository->getUniquePlayedArtists('total', 50),
        ];

        return view('music.library.artists')->with($data);
    }
}
