<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Weather; 

class HomeController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the home view
     */
    public function index()
    {
        $weather = Weather::latest()->first();

        $data = [
            'title'   => 'Home',
            'page'    => 'home',
            'weather' => $weather,
        ];

        return view('home.index')->with($data);
    }
}
