<?php

namespace App\Http\Controllers\Fitbit;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use djchen\OAuth2\Client\Provider\Fitbit;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class GrantAccessController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the authorization code
     *
     * @return RedirectResponse
     */
    public function getAuthorizationCode(): RedirectResponse
    {
        $fitbitProvider = new Fitbit([
            'clientId'     => env('FITBIT_CLIENT_ID'),
            'clientSecret' => env('FITBIT_CLIENT_SECRET'),
            'redirectUri'  => env('FITBIT_REDIRECT_URI')
        ]);

        $authorizationUrl = $fitbitProvider->getAuthorizationUrl();

        Session::put('oAuthState', $fitbitProvider->getState());

        return redirect($authorizationUrl);
    }

    /**
     * Get the access token
     *
     * @param Request $request
     */
    public function getAccessToken(Request $request)
    {
        $fitbitProvider = new Fitbit([
            'clientId'     => env('FITBIT_CLIENT_ID'),
            'clientSecret' => env('FITBIT_CLIENT_SECRET'),
            'redirectUri'  => env('FITBIT_REDIRECT_URI')
        ]);

        $authorizationCode = $request->code;

        if (!empty($authorizationCode)) {

            # Get the access token
            $accessToken = $fitbitProvider->getAccessToken('authorization_code', [
                'code' => $authorizationCode
            ]);

            # Get currently authenticated user and store access and refresh token
            $user = Auth::user();

            $user->fitbit_access_token        = $accessToken->getToken();
            $user->fitbit_refresh_token       = $accessToken->getRefreshToken();
            $user->fitbit_access_token_expiry = $accessToken->getExpires();

            $user->save();

        }

        return redirect()
            ->route('home');
    }
}
