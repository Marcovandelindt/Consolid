@extends('layouts.app')

@section('content')
<h1>Weather Report</h1>
<hr />

<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card card-weather-detail">
            <div class="card-body">
                <div class="weather-date-location">
                    <h3 class="day-name">{{ $weather->getDayName() }}</h3>
                    <p class="text-gray">
                        <span class="weather-date">{{ $weather->getFullDate() }}</span> 
                        <span class="weather-location">{{ $weather->getFullLocation() }}</span>
                    </p>
                </div>
                <div class="weather-data d-flex">
                    <div class="mr-auto">
                        <h4 class="display-5">{{ $weather->condition_text }}</h4>
                        <h4 class="display-3">{{ $weather->temperature }} <sup>o</sup>C</h4>
                        <p><i>But it feels like {{ $weather->feels_like }} <sup>o</sup>C</i></p>
                        <br />
                    </div>
                </div>
                <div class="weather-extra-info">
                    <table class="table custom-table">
                        <tbody>
                            <tr>
                                <td>Wind Force</td>
                                <td>{{ $weather->wind_kph }}</td>
                            </tr>
                            <tr>
                                <td>Wind Direction</td>
                                <td>{{ $weather->wind_direction }}</td>
                            </tr>
                            <tr>
                                <td>Humidity</td>
                                <td>{{ $weather->humidity }}</td>
                            </tr>
                            <tr>
                                <td>Clouds</td>
                                <td>{{ $weather->clouds }}%</td>
                            </tr>
                            <tr>
                                <td>Visibility</td>
                                <td>{{ $weather->visual_km }} KM</td>
                            </tr>
                            <tr>
                                <td>UV</td>
                                <td>{{ $weather->uv }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection