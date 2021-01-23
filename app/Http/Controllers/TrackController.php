<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Track;

class TrackController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the track detail page
     * 
     * @param int $id
     */
    public function index($id)
    {
        $track = Track::findOrFail($id);

        $data = [
            'title' => $track->name,
            'track' => $track,
        ];

        return view('tracks.index')->with($data);
    }
}
