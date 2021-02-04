@extends('layouts.app')

@section('content')

<h1>{{ $title }}</h1>
<hr />

<div class="row">
	@if (session('status'))
	<div class="col-md-12">
		<div class="alert alert-info" role="alert">
			{{ session('status') }}
		</div>
	</div>
	@endif

	@if (count($journals) > 0)
		@foreach ($journals as $journal)
		<div class="col-md-6">
			<div class="card journal-card">
				<div class="card-body">
					<div class="card-title">{{ $journal->name }}</div>
					<p class="card-text text-muted">{{ (mb_strlen($journal->description) > 250) ? mb_substr($journal->description, 0, 250) . '...' : $journal->description }}</p>
					<a class="card-link btn btn-primary" href="{{ route('journal', ['id' => $journal->id]) }}">Open Journal</a>
					<a class="card-link btn btn-warning" href="{{ route('journals.edit', ['id' => $journal->id]) }}">Edit Journal</a>
				</div>
			</div>
		</div>
		@endforeach
	@else 
		<div class="col-md-12">
			<p>
				<i>You don't have any journals yet. Click <a href="{{ route('journals.create') }}">here</a> to create one!</i>
			</p>
		</div>
	@endif
</div>

@endsection