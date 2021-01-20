<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Artist;

class Track extends Model
{
    use HasFactory;

    protected $fillables = [
        'spotify_id',
        'album_id',
        'name',
        'duration_ms',
        'disc_number',
        'popularity',
        'track_number'
    ];

    /**
     * The artists that belong to a track
     */
    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }
}
