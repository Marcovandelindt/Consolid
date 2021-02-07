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

<div class="row">
	<div class="col-md-8">
		<form method="POST" action="{{ route('journals.entries.edit', ['id' => $entry->journal->id, 'entry_id' => $entry->id]) }}">

			@csrf

			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" name="title" id="title" value="{{ $entry->title }}" class="form-control" />
			</div>

			<div class="mb-3">
				<label for="body" class="form-label">Body</label>
				<textarea name="body" id="customEditor" class="form-control">{{ $entry->body }}</textarea>
			</div>

			<div class="mb-3">
				<label for="image" class="form-label">Choose Image</label>
				<br />
				<input type="file" name="image" id="image" />
			</div>

			<div class="mb-3">
				<button type="submit" class="btn btn-primary">Save Changes!</button>
			</div>
		</form>
	</div>
	<div class="col-md-4">
		<!-- Recently created entries for this journal -->
	</div>
</div>
@endsection