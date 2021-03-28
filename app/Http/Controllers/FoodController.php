<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Support\Facades\Request;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        dd($request);
    }
}
