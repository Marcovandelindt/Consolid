<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Track;

class Artist extends Model
{
    use HasFactory;

    protected $fillables = [
        'spotify_id',
        'name', 
        'image',
        'popularity',
        'followers',
    ];

    /**
     * The tracks that belong to an artist
     */
    public function tracks()
    {
        return $this->belongsToMany(Track::class);
    }

    /**
     * Check if an artist has a track
     * 
     * @param int $trackId
     * 
     * @return bool true|false
     */
    public function hasTrack($trackId): bool 
    {
        return $this->tracks()
            ->where('track_id', $trackId
            )->exists();
    }
}
