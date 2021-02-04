<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Journal;

class JournalEntry extends Model
{
    use HasFactory;

    /**
     * Attributes which are mass assignable
     *
     * @var array
     */
    protected $fillable = [
    	'journal_id',
    	'title',
    	'body',
    	'image'
    ];

    /**
     * Get the journal connected to this entry
     */
    public function journal()
    {
    	return $this->belongsTo(Journal::class);
    }
}
