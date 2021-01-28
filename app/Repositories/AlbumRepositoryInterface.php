<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

use App\Repositories\Eloquent\AlbumRepository;

use App\Models\PlayedTrack;

interface AlbumRepositoryInterface 
{
    public function today();

    public function all();

    public function getTopAlbums($limit);
}
