<?php

namespace App\Repositories\Eloquent;

use App\Repositories\JournalRepositoryInterface;

use App\Models\Journal;

class JournalRepository implements JournalRepositoryInterface
{
	/**
	 * Get all the journals
	 */
	public function all()
	{
		return Journal::all();
	}
}