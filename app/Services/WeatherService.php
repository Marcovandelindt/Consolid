<?php

namespace App\Services;

use App\Models\Weather;

class WeatherService 
{
    /**
     * Check whether a new record can be insterted
     */
    public function canInsertNewRecord()
    {
        $lastInsertedTime = strtotime(Weather::latest()->first()->created_at);
        $timeToCheck      = strtotime("-15 minutes");

        if ($lastInsertedTime >= $timeToCheck) {
            return false;
        }

        return true;
    }
}