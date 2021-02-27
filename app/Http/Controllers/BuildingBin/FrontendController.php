<?php

namespace App\Http\Controllers\BuildingBin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index action
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $data = [
            'title' => 'Building Bin - Frontend'
        ];

        return view('building-bin.frontend.index')->with($data);
    }
}
