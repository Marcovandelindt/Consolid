<?php

namespace App\Services;

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
     * Get all the scopes
     */
    public function getAllScopes()
    {
        return [
            'scope' => self::SCOPES,
        ];
    }
} 