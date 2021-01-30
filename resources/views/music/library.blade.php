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

    <!-- Top Tracks Card -->
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
        <!-- /Top Tracks Card -->

        <br />

        <!-- Top Artists Card -->
        <div class="card tracks-card">
            <div class="card-header">
                <h4 class="card-title">Top Artists of all time</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="media-list">
                        @if (!empty($topArtists))
                        <ul class="list-unstyled">
                            @foreach ($topArtists as $topArtist) 
                            <li class="media">
                                <a href="{{ route('artist', ['id' => $topArtist->id]) }}" class="media-left">
                                    <img src="{{ $topArtist->image }}" height="64" width="64"/>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{ route('artist', ['id' => $topArtist->id]) }}">{{ $topArtist->name }}</a>
                                    </h4>
                                    <span class="float-right played-time">{{ $topArtist->artist_count }} Plays</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /Top Artists Card -->

        <br />

        <!-- Top Albums Card -->
        <div class="card tracks-card">
            <div class="card-header">
                <h4 class="card-title">Top Albums of all time</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="media-list">
                        @if (!empty($topAlbums))
                        <ul class="list-unstyled">
                            @foreach ($topAlbums as $topAlbum)
                            <li class="media">
                                 <a href="#" class="media-left">
                                    <img src="{{ $topAlbum->image }}" height="64" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        @foreach ($topAlbum->artists as $artist)
                                            <a href="{{ route('artist', ['id' => $artist->id]) }}">{{ $artist->name }}</a> {{ !$loop->last ? ',' : '' }}
                                        @endforeach
                                    </h4>
                                    <span class="track-name">{{ $topAlbum->name }}</span>
                                    <span class="float-right played-time">{{ $topAlbum->album_count }} Plays</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--/Top Albums Card -->
    </div>
</div>
<br />
@endsection