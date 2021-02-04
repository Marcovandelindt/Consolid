@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h1 class="display-5">{{ $entry->title }}</h1>
                    <hr />
                </div>
                <div class="card-content">
                    {!! $entry->body !!}
                </div>
                <div class="card-footer pt-3">
                    <p><i><strong>Written by {{ Auth::user()->name }} on {{ date('l d M Y, H:i', strtotime($entry->created_at)) }}</strong></i></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection