<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\JournalEntry;

class Journal extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable
     *
     * @var array 
     */
    protected $fillable = [
    	'name',
    	'description',
    ];

    /**
     * Get the entries connected to this journal
     */
    public function entries()
    {
        return $this->hasMany(JournalEntry::class);
    }
}
