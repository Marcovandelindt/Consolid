<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Track;
use App\Models\Artist;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'spotify_id',
        'name', 
        'image',
        'release_date',
        'total_tracks',
        'type',
        'play_count',
    ];

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }
}
