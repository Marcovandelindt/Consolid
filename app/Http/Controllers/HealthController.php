<?php

namespace App\Http\Controllers;

use djchen\OAuth2\Client\Provider\Fitbit;
use Illuminate\Http\Request;

use App\Services\Fitbit\ActivityService;

class HealthController extends Controller
{
    protected $fitbitProvider;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->fitbitProvider = new Fitbit([
            'clientId'     => env('FITBIT_CLIENT_ID'),
            'clientSecret' => env('FITBIT_CLIENT_SECRET'),
            'redirectUri'  => env('FITBIT_REDIRECT_URI'),
        ]);
    }

    /**
     * Index action
     */
    public function index()
    {
        dd(ActivityService::getCaloriesBurnedDuringActivity());
    }
}
