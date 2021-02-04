<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Models\JournalEntry;
use App\Models\Journal;

use App\Http\Requests\StoreJournalEntryRequest;

class JournalEntryController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show the detail view of a journal entry
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function index($id): View 
    {
    	$entry = JournalEntry::findOrFail($id);

    	$data = [
    		'title'   => $entry->title,
    		'entry'   => $entry,
    		'journal' => $entry->journal,
    	];

    	return view('journals.entries.index')
    		->with($data);
    }

    /**
     * Show the create view of a new journal entry
     *
     * @param int $journalId
     *
     * @return \Illuminate\View\View;
     */
    public function create($journalId): View
    {
    	$journal = Journal::findOrFail($journalId);

    	$data = [
    		'title'   => 'New entry for ' . $journal->name,
    		'journal' => $journal,
    	];

    	return view('journals.entries.create')
    		->with($data);
    }

    /**
     * Store a new journal entry
     *
     * @param int $journalId
     * @param \App\Http\Requests\StoreJournalEntryRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($journalId, StoreJournalEntryRequest $request): RedirectResponse 
    {
    	$journal = Journal::findOrFail($journalId);

    	$entry = new JournalEntry;

    	$entry->journal_id = $journal->id;
    	$entry->title 	   = $request->title;
    	$entry->body  	   = $request->body;

    	$entry->save();

    	return redirect()
    		->route('journal', ['id' => $journal->id])
    		->with('status', 'Entry successfully created');
    }
}
