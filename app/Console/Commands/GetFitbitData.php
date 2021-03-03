<?php

namespace App\Console\Commands;

use App\Models\ActivityStep;
use Illuminate\Console\Command;

use App\Models\User;
use App\Services\Fitbit\ActivityService as FitbitActivityService;
use djchen\OAuth2\Client\Provider\Fitbit;

class GetFitbitData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fitbit:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve data from the Fitbit API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        # Get the user
        $user = User::find(1);

        # Create new Fitbit Provider
        $fitbitProvider = new Fitbit([
            'clientId'     => env('FITBIT_CLIENT_ID'),
            'clientSecret' => env('FITBIT_CLIENT_SECRET'),
            'redirectUri'  => env('FITBIT_REDIRECT_URI')
        ]);

        # Check if access token needs to be refreshed
        if (time() > $user->getFitbitAccessTokenExpiry()) {
            $newAccessToken = $fitbitProvider->getAccessToken('refresh_token', [
                'refresh_token' => $user->getFitbitRefreshToken()
            ]);

            $user->setFitbitAccessToken($newAccessToken->getToken());
            $user->setFitbitAccessTokenExpiry($newAccessToken->getExpires());

            $user->save();
        }

        # Get activities data
        $steps = FitbitActivityService::getSteps();

        # Save steps
        if (!empty($steps)) {
            foreach ($steps['activities-steps'] as $stepData) {
                if (empty(ActivityStep::where('date_time', $stepData['dateTime'])->first())) {
                    $activityStep           = new ActivityStep();
                    $activityStep->steps    = $stepData['value'];
                    $activityStep->date_time = $stepData['dateTime'];
                    $activityStep->save();
                }
            }
        }


        # Log info
        $this->info('Cron has run successfully');
    }
}
