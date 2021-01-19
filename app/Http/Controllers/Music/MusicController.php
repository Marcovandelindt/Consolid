<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicController extends Controller
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
