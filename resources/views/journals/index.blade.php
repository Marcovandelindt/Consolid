@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-heading">
			<h1>{{ $title }}</h1>
			<hr />
		</div>
	</div>
</div>

@if (session('status'))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-info" role="alert">{{ session('status') }}</div>
	</div>
</div>	
@endif

<div class="row">
	@if (count($entries) > 0)
		@foreach ($entries as $entry)
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<div class="card-title">{{ $entry->title }}</div>
					<p class="card-text text-muted">{!! (mb_strlen($entry->body) > 250) ? mb_substr($entry->body, 0, 250) . '...' : $entry->body !!}</p>
					<a class="card-link btn btn-primary" href="{{ route('journals.entry', ['id' => $entry->journal->id, 'entry_id' => $entry->id]) }}">Read full entry</a>
					<a class="card-link btn btn-warning" href="{{ route('journals.entries.edit', ['id' => $entry->journal->id, 'entry_id' => $entry->id]) }}">Edit Entry</a>
				</div>
			</div>
		</div>
		@endforeach
	@else
		<div class="col-md-12">
			<p>
				<i>You don't have any entries for this journal yet. Click <a href="{{ route('journals.entries.create', ['id' => $journal->id]) }}">here</a> to create one!</i>
			</p>
		</div>
	@endif
</div>

@endsection