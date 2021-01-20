<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
