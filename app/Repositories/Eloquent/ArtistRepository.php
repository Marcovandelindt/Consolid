<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Models\Album;
use App\Models\Artist;
use App\Models\PlayedTrack;
use App\Repositories\ArtistRepositoryInterface;
use App\Repositories\PlayedTrackRepository;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * Get the uniquely played artists based on a given timeframe
     * 
     * @param string $timeFrame
     * @param mixed  $paginatedResults
     * 
     * @return mixed
     */
    public function getUniquePlayedArtists($timeFrame, $paginatedResults = null): mixed
    {
        $results = [];

        switch ($timeFrame) {
            case 'total':

                if (is_numeric($paginatedResults)) {
                    $results = Artist::select('artists.*', DB::raw('COUNT(*) as `total`'))
                        ->join('artist_track', 'artists.id', '=', 'artist_track.artist_id')
                        ->join('played_tracks', 'artist_track.track_id', '=', 'played_tracks.track_id')
                        ->groupBy('artists.id')
                        ->orderByRaw('COUNT(*) DESC')
                        ->paginate($paginatedResults);
                } else {
                    $results = Artist::select('artists.*', DB::raw('COUNT(*) as `total`'))
                        ->join('artist_track', 'artists.id', '=', 'artist_track.artist_id')
                        ->join('played_tracks', 'artist_track.track_id', '=', 'played_tracks.track_id')
                        ->groupBy('artists.id')
                        ->orderByRaw('COUNT(*) DESC')
                        ->get();
                }

                break;
        }

        return $results;
    }
}