<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MusicLibraryPlaysController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index action
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $data = [
            'title'       => 'Plays',
            'requestType' => 'plays',
        ];

        return view('music.library')->with($data);
    }
}
