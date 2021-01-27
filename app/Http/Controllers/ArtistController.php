<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the artist detail view
     * 
     * @param int $id
     * 
     * @return \Illuminate\View\View
     */
    public function index($id): View
    {
        $artist = Artist::findOrFail($id);

        $data = [
            'title'  => $artist->name,
            'artist' => $artist,
        ];

        return view('artists.detail')->with($data);
    }
}
