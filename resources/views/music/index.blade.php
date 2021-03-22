@extends('layouts.app')

@section('content')

<h1>{{ $title }}</h1>
<hr />

<div class="row">
    <div class="col-xl-3">
        @include('components.cards.spotify-card')
    </div>
     <div class="col-xl-3">
       @include('components.cards.album-card')
    </div>
     <div class="col-xl-3">
        @include('components.cards.artist-card')
    </div>
     <div class="col-xl-3">
        @include('components.cards.listening-time-card')
    </div>
</div>

<br />

<div class="row">
    <div class="col-xl-6 col-lg-12">
        <div class="card tracks-card">
            <div class="card-header">
                <h4 class="card-title">Recently Played Tracks</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="media-list">
                        @if (!empty($tracks))
                            @foreach ($tracks as $playedTrack)
                                <div class="media">
                                    <a href="{{ route('track', ['id' => $playedTrack->track_id]) }}" class="media-left">
                                        @if (!empty($playedTrack->track->album))
                                            <img src="{{ $playedTrack->track->album->image }}" height="64" />
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            @foreach ($playedTrack->track->artists as $artist)
                                                <a href="{{ route('artist', ['id' => $artist->id]) }}">{{ $artist->name }}</a> {{ !$loop->last ? ',' : '' }}
                                            @endforeach
                                        </h4>
                                        <span class="track-name">{{ $playedTrack->track->name }}</span>
                                        <span class="float-right played-time">{{ date('H:i', ($playedTrack->played_at + 60 * 60)) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p><i>You haven't listened to any music today</i></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if (!empty($tracks->links()))
        <br />
            <div class="pagination">
                {{ $tracks->links() }}
            </div>
        <br />
        @endif
    </div>

    <div class="col-xl-6 col-lg-12 text-center">
        <h2>Listening History</h2>
        <p>Pssst, want to see all the tracks you've listened to since the start? Please click the button below!</p>
        <p><a class="btn btn-primary" href="{{ route('music.library') }}">Visit Library</a></p>
    </div>
</div>
<br />
@endsection
