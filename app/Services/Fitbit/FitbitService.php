<?php

namespace App\Services\Fitbit;

use Illuminate\Support\Facades\Auth;
use djchen\OAuth2\Client\Provider\Fitbit;

class FitbitService
{
    /**
     * Get te response from an endpoint
     *
     * @param Fitbit $fitbotProvider
     * @param string $endpoint
     * @param string $timePeriod
     *
     * @return array $response
     *
     */
    public static function getResponse($endpoint, $timePeriod = null): array
    {
        $fitbitProvider = new Fitbit([
            'clientId'     => env('FITBIT_CLIENT_ID'),
            'clientSecret' => env('FITBIT_CLIENT_SECRET'),
            'redirectUri'  => env('FITBIT_REDIRECT_URI'),
        ]);

        $request = $fitbitProvider->getAuthenticatedRequest(
            Fitbit::METHOD_GET,
            Fitbit::BASE_FITBIT_API_URL . '/1/user/-/' . $endpoint . '/date/' . date('Y-m-d') . (!empty($timePeriod) ? '/' . $timePeriod : '/1d') . '.json',
            Auth::user()->getFitbitAccessToken(),
            [
                'headers' => [
                    Fitbit::HEADER_ACCEPT_LANG => 'en_US'
                ],
                [
                    Fitbit::HEADER_ACCEPT_LOCALE => 'en_US'
                ]
            ]
        );

        $response = $fitbitProvider->getParsedResponse($request);

        return $response;
    }
}
