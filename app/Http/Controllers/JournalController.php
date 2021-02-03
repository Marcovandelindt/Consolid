<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Repositories\JournalRepositoryInterface;

use App\Http\Requests\StoreJournalRequest;

use App\Models\Journal;

class JournalController extends Controller
{
	protected $journalRepository;

    /**
     * Constructor
     */
    public function __construct(JournalRepositoryInterface $journalRepository)
    {
    	$this->middleware('auth');

    	$this->journalRepository = $journalRepository;
    }

    /**
     * Show the journals view
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
    	$data = [
    		'title'    => 'Journals',
    		'page'	   => 'journals',
    		'journals' => $this->journalRepository->all(),
    	];

    	return view('journals.index')->with($data);
    }

    /**
     * Show the create view of a Journal
     *
     * @return  \Illuminate\View\View
     */
    public function create(): View 
    {
    	$data = [
    		'title' => 'Create Journal'
    	];

    	return view('journals.create')->with($data);
    }

    /**
     * Store a new Journal Entry
     *
     * @param \App\Http\Requests\StoreJournalRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreJournalRequest $request): RedirectResponse
    {
    	$journal = new Journal;

    	$journal->name        = $request->name;
    	$journal->description = $request->description;

    	$journal->save();

    	return redirect()
    		->route('journals')
    		->with('status', 'Journal successfully saved');
    }
}
