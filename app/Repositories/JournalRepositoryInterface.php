<?php

namespace App\Repositories;

use App\Repositories\Eloquent\JournalRepository;
use App\Models\Journal;

interface JournalRepositoryInterface
{
	public function all();
}