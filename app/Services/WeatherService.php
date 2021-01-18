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
        if (Weather::latest()->first() && strtotime(Weather::latest()->first()) < strtotime('-15 minutes')) {
            return false;
        }

        return true;
    }
}