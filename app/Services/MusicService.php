<?php

namespace App\Services;

use App\Models\Track;

use App\Services\ArtistService;

class MusicService 
{
    /**
     * Define the scopes for authorization
     */
    const SCOPES = [
        'ugc-image-upload',
        'user-read-recently-played',
        'user-top-read',
        'user-read-playback-position',
        'user-read-playback-state',
        'user-modify-playback-state',
        'user-read-currently-playing',
        'app-remote-control',
        'streaming',
        'playlist-modify-public',
        'playlist-modify-private',
        'playlist-read-private',
        'playlist-read-collaborative',
        'user-follow-modify',
        'user-follow-read',
        'user-library-modify',
        'user-library-read',
        'user-read-email',
        'user-read-private',
    ];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artistService = new ArtistService;
    }

    /**
     * Get all the scopes
     */
    public function getAllScopes()
    {
       return [
           'scope' => self::SCOPES
       ];
    }

    /**
     * Add tracks
     * 
     * @param array $tracks
     * @param \SpotifyWebAPI\SpotifyWebAPI $api
     */
    public function addTracks($tracks, $api)
    {
        if (!empty($tracks)) {
            foreach ($tracks->items as $data) {
                
                # Check if track exists
                if (!Track::where('spotify_id', $data->track->id)->first()) {
                    $trackData = $api->getTrack($data->track->id);


                    $track = new Track();

                    $track->spotify_id   = $trackData->id;
                    $track->name         = $trackData->name;
                    $track->duration_ms  = $trackData->duration_ms;
                    $track->disc_number  = $trackData->disc_number;
                    $track->popularity   = $trackData->popularity;
                    $track->track_number = $trackData->track_number;

                    $track->save();

                    # Save the artists
                    $this->artistService->addArtists($trackData->artists, $track->id, $api);

                }
            }
        }
    }
}