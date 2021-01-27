@extends('layouts.app')

@section('content')

<h1>{{ $title }}</h1>
<hr />

<div class="row">
    <div class="col-xl-3">
        <div class="card custom-card spotify-card statistics-card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-white text-left align-self-bottom mt-3">
                            <h5 class="d-block mb-1 font-medium-1">Played Tracks Total</h5>
                            <h1 class="text-white mb-0">{{ count($totalPlayedTracks) }}</h1>
                        </div>
                        <div class="align-self-top">
                            <i class="float-right icon">
                                <i class="fab fa-spotify text-white"></i><br />
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card album-card statistics-card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-white text-left align-self-bottom mt-3">
                            <h5 class="d-block mb-1 font-medium-1">Played Albums Total</h5>
                            <h1 class="text-white mb-0">{{ count($totalPlayedAlbums) }}</h1>
                        </div>
                        <div class="align-self-top">
                            <i class="float-right icon">
                                <i class="fas fa-record-vinyl text-white"></i><br />
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card artist-card statistics-card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-white text-left align-self-bottom mt-3">
                            <h5 class="d-block mb-1 font-medium-1">Played Artists Total</h5>
                            <h1 class="text-white mb-0">{{ count($totalPlayedArtists) }}</h1>
                        </div>
                        <div class="align-self-top">
                            <i class="float-right icon">
                                <i class="fas fa-users text-white"></i><br />
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card listening-time-card statistics-card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-white text-left align-self-bottom mt-3">
                            <h5 class="d-block mb-1 font-medium-1">Total Time Listened</h5>
                            <h1 class="text-white mb-0">{{ $totalListeningTime }} hours</h1>
                        </div>
                        <div class="align-self-top">
                            <i class="float-right icon">
                                <i class="fas fa-clock text-white"></i><br />
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</div>
<br />
@endsection