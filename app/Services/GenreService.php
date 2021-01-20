<?php

namespace App\Services;

use App\Models\Genre;

class GenreService 
{
    /**
     * Create a system name for the genre
     * 
     * @param string $name
     * 
     * @return string
     */
    public function createSystemName($name): string
    {
        $system_name = str_replace('(', '', $name);
        $system_name = str_replace(')', '', $system_name);
        $system_name = str_replace(' ', '_', $system_name);
        $system_name = str_replace('.', '', $system_name);
        $system_name = str_replace('\'', '', $system_name);
        $system_name = strtolower($system_name);

        return $system_name;
    }

    /**
     * Add a Genre
     * 
     * @param string $genre
     * 
     * @return void
     */
    public function addGenre($genreData): void
    {
        $systemName = $this->createSystemName($genreData);
                        
        if (!Genre::where('system_name', $systemName)->first()) {
            $genre              = new Genre();
            $genre->name        = $genreData;
            $genre->system_name = $systemName;

            $genre->save();
        }
    }
}