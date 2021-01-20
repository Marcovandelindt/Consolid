<?php

namespace App\Services;

use SpotifyWebAPI\SpotifyWebAPI;

use App\Models\Track;
use App\Models\Artist;

class ArtistService 
{
    /**
     * Add the artists to a track
     * 
     * @param array                         $artists
     * @param id                            $trackId
     * @param \SpotifyWebAPI\SpotifyWebAPI  $api
     * 
     * @return void
     */
    public function addArtists($artists, $trackId, $api): void
    {
        if (!empty($artists) && Track::where('id', $trackId)->first()   ) {
            foreach ($artists as $data) {
                if (!Artist::where('spotify_id', $data->id)->first()) {
                    $artistData = $api->getArtist($data->id);

                    $artist = new Artist();

                    $artist->spotify_id = $artistData->id;
                    $artist->name       = $artistData->name;
                    $artist->image      = !empty($artistData->images) ? $artistData->images[0]->url : '';
                    $artist->popularity = $artistData->popularity;
                    $artist->followers  = $artistData->followers->total;

                    $artist->save();
                }
            }
        }
    }
}