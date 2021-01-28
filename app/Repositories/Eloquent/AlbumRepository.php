<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;

use App\Models\Album;
use App\Models\PlayedTrack;
use App\Repositories\AlbumRepositoryInterface;
use App\Repositories\PlayedTrackRepository;

class AlbumRepository implements AlbumRepositoryInterface 
{
    /**
     * Get all played albums today
     */
    public function today()
    {
        $playedTracks = PlayedTrack::where('played_date', date('Y-m-d'))->get();

        $albums = [];
        foreach ($playedTracks as $playedTrack) {
            $albums[$playedTrack->track->album->id] = $playedTrack->track->album;
        }

        return $albums;
    }

    /**
     * Get all played albums
     */
    public function all()
    {
        return Album::all();
    }

    /**
     * Get the top albums
     * 
     * @param int $limit
     */
    public function getTopAlbums($limit) 
    {
        return Album::select('albums.*', DB::raw('count(*) as album_count'))
                ->join('tracks', 'albums.id', '=', 'tracks.album_id')
                ->join('played_tracks', 'tracks.id', '=', 'played_tracks.track_id')
                ->groupBy('albums.id')
                ->orderByRaw('COUNT(*) DESC')
                ->limit($limit)
                ->get();
    }
}