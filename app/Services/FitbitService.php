<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Http;
use djchen\OAuth2\Client\Provider\Fitbit;

class FitbitService
{
    const TODAYS_STEPS_ENDPOINT = '/activities/steps/date/today/1d.json';

    /**
     * Build the request
     *
     */
    protected static function getResponse(Fitbit $fitbitProvider, $endpoint)
    {
        $request = $fitbitProvider->getAuthenticatedRequest(
            Fitbit::METHOD_GET,
            Fitbit::BASE_FITBIT_API_URL . '/1/user/-' . $endpoint,
            Auth::user()->fitbitAccessToken,
            ['headers' => [Fitbit::HEADER_ACCEPT_LANG => 'en_US'], [Fitbit::HEADER_ACCEPT_LOCALE => 'en_US']]
        );

        $response = $fitbitProvider->getParsedResponse($request);

        return $response;
    }

    /**
     * Get all of todays steps
     */
    public static function getTodaysSteps(Fitbit $fitbitProvider)
    {
        $result = self::getResponse($fitbitProvider, self::TODAYS_STEPS_ENDPOINT);

        if (!empty($result)) {
            $date  = $result['activities-steps'][0]['dateTime'];
            $steps = $result['activities-steps'][0]['value'];
        }
    }
}
