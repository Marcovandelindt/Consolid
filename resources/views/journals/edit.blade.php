@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1>
<hr />

<div class="row">
	<div class="col-md-8">
		<form method="POST" action="{{ route('journals.edit', ['id' => $journal->id]) }}">
			@csrf

			<div class="mb-3">
				<label for="name" class="form-label">Journal Name</label>
				<input type="text" name="name" class="form-control" id="name" value="{{ $journal->name }}" />
			</div>

			<div class="mb-3">
				<label for="description" class="form-label">Journal Description</label>
				<textarea class="form-control" name="description" rows="5">{{ $journal->description }}</textarea>
			</div>

			<div class="mb-3">
				<button type="submit" class="btn btn-primary">Save Changes</button>
			</div>
		</form>
	</div>
</div>
@endsection