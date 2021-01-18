<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = [
            'title' => 'Home',
            'page'  => 'home'
        ];

        return view('home.index')->with($data);
    }
}
