<?php

namespace App\Services\Fitbit;

use App\Services\Fitbit\FitbitService as FitbitService;

class ActivityService
{
    /**
     * Activity Endpoints
     */
    CONST ACTIVTY_SUMMARY                 = 'activities';
    const ACTIVITY_CALORIES               = 'activities/calories';
    const ACTIVITY_STEPS                  = 'activities/steps';
    const ACTIVITY_DISTANCE               = 'activities/distance';
    const ACTIVITY_MINUTES_SEDENTARY      = 'activities/minutesSedentary';
    const ACTIVITY_MINUTES_LIGHTLY_ACTIVE = 'activities/minutesLightlyActive';
    const ACTIVITY_MINUTES_FAIRLY_ACTIVE  = 'activities/minutesFairlyActive';
    const ACTIVITY_MINUTES_VERY_ACTIVE    = 'activities/minutesVeryActive';
    const ACTIVTY_ACTIVE_CALORIES_BURNED  = 'activities/activityCalories';

    /**
     * Define the fitbit provider
     */
    protected $fitbitProvider;

    /**
     * Constructor
     *
     */

    /**
     * Get the activity summary
     *
     * @param string $timePeriod
     *
     * @return array
     */
    public static function getActivitySummary(string $timePeriod = null): array
    {
        $response = FitbitService::getResponse(self::ACTIVTY_SUMMARY, $timePeriod);

        return $response;
    }

    /**
     * Get the amount of calories burned
     *
     * @param string $timePeriod
     *
     * @return array
     */
    public static function getCaloriesBurned(string $timePeriod = null): array
    {
        $response = FitbitService::getResponse(self::ACTIVITY_CALORIES, $timePeriod);

        return $response;
    }

    /**
     * Get the amount of steps
     *
     * @param string $timePeriod
     *
     * @return array
     */
    public static function getSteps(string $timePeriod = null): array
    {
        $response = FitbitService::getResponse(self::ACTIVITY_STEPS, $timePeriod);

        return $response;
    }

    /**
     * Get the amount of distance travelled
     * Note, the return value is in miles so this should be converted to km
     *
     * @param string $timePeriod
     *
     * @return array
     */
    public static function getDistanceTravelled(string $timePeriod = null): array
    {
        $response = FitbitService::getResponse(self::ACTIVITY_DISTANCE, $timePeriod);

        return $response;
    }

    /**
     * Get sedentary minutes
     *
     * @param string $timePeriod
     *
     * @return array
     */
    public static function getSedentaryMinutes(string $timePeriod = null): array
    {
        $response = FitbitService::getResponse(self::ACTIVITY_MINUTES_SEDENTARY, $timePeriod);

        return $response;
    }

    /**
     * Get minutes lightly active
     *
     * @param string $timePeriod
     *
     * @return array
     */
    public static function getMinutesLightlyActive(string $timePeriod = null): array
    {
        $response = FitbitService::getResponse(self::ACTIVITY_MINUTES_LIGHTLY_ACTIVE, $timePeriod);

        return $response;
    }

    /**
     * Get minutes fairly active
     *
     * @param string $timePeriod
     *
     * @return array
     */
    public static function getMinutesFairlyActive(string $timePeriod = null): array
    {
        $response = FitbitService::getResponse(self::ACTIVITY_MINUTES_FAIRLY_ACTIVE, $timePeriod);

        return $response;
    }

    /**
     * Get minutes very active
     *
     * @param string $timePeriod
     *
     * @return array
     */
    public static function getMinutesVeryActive(string $timePeriod = null): array
    {
        $response = FitbitService::getResponse(self::ACTIVITY_MINUTES_VERY_ACTIVE, $timePeriod);

        return $response;
    }

    /**
     * Get the calories burned during all activities combined
     *
     * @param string $timePeriod
     *
     * @return array
     */
    public static function getCaloriesBurnedDuringActivity(string $timePeriod = null): array
    {
        $response = FitbitService::getResponse(self::ACTIVTY_ACTIVE_CALORIES_BURNED, $timePeriod);

        return $response;
    }
}
