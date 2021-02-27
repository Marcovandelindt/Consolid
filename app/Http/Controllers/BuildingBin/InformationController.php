<?php

namespace App\Http\Controllers\BuildingBin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class InformationController extends Controller
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
            'title' => 'Building Bin - Information',
        ];

        return view('building-bin.information.index')->with($data);
    }
}
