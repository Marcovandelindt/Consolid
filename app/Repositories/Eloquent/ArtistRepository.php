<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Models\Album;
use App\Models\Artist;
use App\Models\PlayedTrack;
use App\Repositories\ArtistRepositoryInterface;
use App\Repositories\PlayedTrackRepository;

class ArtistRepository implements ArtistRepositoryInterface 
{
    /**
     * Get all played albums today
     */
    public function today()
    {
        $playedTracks = PlayedTrack::where('played_date', date('Y-m-d'))->get();

        $artists = [];
        foreach ($playedTracks as $playedTrack) {
            foreach ($playedTrack->track->artists as $artist) {
                $artists[$artist->id] = $artist;
            }
        }

        return $artists;
    }

    /**
     * Get all played artists
     */
    public function all()
    {
        return Artist::all();
    }

    /**
     * Get the top artists
     * 
     * @param int $limit
     */
    public function getTopArtists($limit)
    {
        return Artist::select('artists.*', DB::raw('count(*) as artist_count'))
            ->join('artist_track', 'artists.id', '=', 'artist_track.artist_id')
            ->join('played_tracks', 'artist_track.track_id', '=', 'played_tracks.track_id')
            ->groupBy('artists.id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit($limit)
            ->get();
    }
}