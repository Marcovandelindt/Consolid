<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
Use Illuminate\Support\Str;

use App\Models\JournalEntry;
use App\Models\Journal;

use App\Http\Requests\StoreJournalEntryRequest;

use App\Traits\ImageUploadTrait;

class JournalEntryController extends Controller
{
    use ImageUploadTrait;

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
     * @param int $entry_id
     *
     * @return \Illuminate\View\View
     */
    public function index($id, $entry_id): View 
    {
    	$entry = JournalEntry::findOrFail($entry_id);

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
        
        # Store image
        if ($request->has('image')) {
            $image  = $request->file('image');
            $name   = Str::slug($image->getClientOriginalName() . '_' . time());
            $folder = '/uploads/images/';
            $path   = $folder . $name . '.' . $image->getClientOriginalExtension();

            $this->storeImage($image, $folder, 'public', $name);

            $entry->image = $path;
        }

    	$entry->save();

    	return redirect()
    		->route('journal', [
                'id' => $journal->id
            ])
    		->with('status', 'Entry successfully created');
    }

    /**
     * Show the edit view for a journal entry
     * 
     * @param int $journalId
     * @param int $entryId
     * 
     * @return \Illuminate\View\View
     */
    public function edit($journalId, $entryId): View
    {
        $entry = JournalEntry::findOrFail($entryId);

        $data = [
            'title' => 'Edit - ' . $entry->title,
            'entry' => $entry
        ];

        return view('journals.entries.edit')
            ->with($data);
    }

    /**
     * Update the journal entry
     * 
     * @param int $journalId
     * @param int $entryId
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($journalId, $entryId, StoreJournalEntryRequest $request): RedirectResponse 
    {
        $entry = JournalEntry::findOrFail($entryId);

        $entry->title = $request->title;
        $entry->body  = $request->body;

        # Store image
        if ($request->has('image')) {
            $image  = $request->file('image');
            $name   = Str::slug($image->getClientOriginalName() . '_' . time());
            $folder = '/uploads/images/';
            $path   = $folder . $name . '.' . $image->getClientOriginalExtension();

            $this->storeImage($image, $folder, 'public', $name);

            $entry->image = $path;
        }

        $entry->save();

        return redirect()
            ->route('journals.entry', [
                'id'       => $journalId,
                'entry_id' => $entry->id,
            ])
            ->with('status', 'Entry successfully edited');
    }
}
