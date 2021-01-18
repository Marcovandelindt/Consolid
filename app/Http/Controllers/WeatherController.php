<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use App\Http\Requests\StoreWeatherRequest;

use App\Models\Weather;

use App\Services\WeatherService;

class WeatherController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->weatherService = new WeatherService;
    }

    /**
     * Show the home view
     */
    public function index()
    {
        $weather = Weather::latest()->first();

        $data = [
            'title'   => 'Weather', 
            'page'    => 'weather',
            'weather' => $weather,
        ];

        return view('weather.index')->with($data);

    }

    /**
     * Update the weather
     */
    public function update(Request $request)
    {
        if ($this->weatherService->canInsertNewRecord()) {
            $response = Http::get('http://api.weatherapi.com/v1/current.json?key=' . Auth::user()->weather_api_key . '&q=Mijdrecht');   
            
            if ($response->status() == 200) {                
                $location = $response->json()['location'];
                $current  = $response->json()['current'];

                $weather = new Weather();

                $weather->name    = $location['name'];
                $weather->region  = $location['region'];
                $weather->country = $location['country'];

                $weather->temperature    = $current['temp_c'];
                $weather->condition_text = $current['condition']['text'];
                $weather->condition_code = $current['condition']['code'];
                $weather->condition_icon = $current['condition']['icon'];
                $weather->wind_kph       = $current['wind_kph'];
                $weather->wind_degree    = $current['wind_degree'];
                $weather->wind_direction = $current['wind_dir'];
                $weather->humidity       = $current['humidity'];
                $weather->clouds         = $current['cloud'];
                $weather->feels_like     = $current['feelslike_c'];
                $weather->visual_km      = $current['vis_km'];
                $weather->uv             = $current['uv'];

                $weather->save();

                return redirect()->route('home');
                }
        } else {
            return redirect()->route('home')->with('info', 'You can only update the weather once every 15 minutes!');
        }
    }
}
