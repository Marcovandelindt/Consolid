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
                <h4 class="card-title">All Played Tracks</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="media-list">
                        @if (!empty($paginatedPlayedTracks))
                            @foreach ($paginatedPlayedTracks as $playedTrack)
                                <div class="media">
                                    <a href="{{ route('track', ['id' => $playedTrack->track_id]) }}" class="media-left">
                                        <img src="{{ $playedTrack->track->album->image }}" height="64" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            @foreach ($playedTrack->track->artists as $artist)
                                                <a href="{{ route('artist', ['id' => $artist->id]) }}">{{ $artist->name }}</a> {{ !$loop->last ? ',' : '' }}
                                            @endforeach
                                        </h4>
                                        <span class="track-name">{{ $playedTrack->track->name }}</span>
                                        <span class="float-right played-time">{{ date('Y-m-d H:i', ($playedTrack->played_at + 60 * 60)) }}</span>
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
        <br />

        <div class="tracks-pagination">
            {{ $paginatedPlayedTracks->links() }}
        </div>
    </div>

    <div class="col-xl-6 col-lg-12">
        <div class="card tracks-card">
            <div class="card-header">
                <h4 class="card-title">Top Tracks of all time</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="media-list">
                        @if (!empty($topTracks))
                        <ul class="list-unstyled">
                            @foreach ($topTracks as $topTrack)
                            <li class="media">
                                 <a href="{{ route('track', ['id' => $topTrack->track_id]) }}" class="media-left">
                                    <img src="{{ $topTrack->track->album->image }}" height="64" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        @foreach ($topTrack->track->artists as $artist)
                                            <a href="{{ route('artist', ['id' => $artist->id]) }}">{{ $artist->name }}</a> {{ !$loop->last ? ',' : '' }}
                                        @endforeach
                                    </h4>
                                    <span class="track-name">{{ $topTrack->track->name }}</span>
                                    <span class="float-right played-time">{{ $topTrack->total }} Plays</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
<br />
@endsection