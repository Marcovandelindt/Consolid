<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    /**
     * Get the full date of a weather object
     * 
     * @return string
     */
    public function getFullDate(): string
    {
        return date('d', strtotime($this->created_at)) . ' ' . date('F', strtotime($this->created_at)) . ', ' . date('Y', strtotime($this->created_at));
    }

    /**
     * Get the name of the day
     * 
     * @return string
     */
    public function getDayName():string
    {
        return date('l', strtotime($this->created_at));
    }

    /**
     * Get the full location
     * 
     * @return string
     */
    public function getFullLocation() 
    {
        return $this->name . ', ' . $this->region;
    }

}
