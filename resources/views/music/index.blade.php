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
                            <h5 class="d-block mb-1 font-medium-1">Played Tracks Today</h5>
                            <h1 class="text-white mb-0">{{ count($playedTracks) }}</h1>
                            <i>{{ $totalPlayedTracks }} tracks played in total</i>
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
                            <h5 class="d-block mb-1 font-medium-1">Played Albums Today</h5>
                            <h1 class="text-white mb-0">{{ count($playedAlbums) }}</h1>
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
                            <h5 class="d-block mb-1 font-medium-1">Played Artists Today</h5>
                            <h1 class="text-white mb-0">{{ count($playedArtists) }}</h1>
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
                            <h5 class="d-block mb-1 font-medium-1">Total Time Listened Today</h5>
                            <h1 class="text-white mb-0">{{ $listeningTime }} hours</h1>
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
                <h4 class="card-title">Recently Played Tracks</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="media-list">
                        @if (!empty($playedTracks))
                            @foreach ($playedTracks as $playedTrack)
                                <div class="media">
                                    <a href="{{ route('track', ['id' => $playedTrack->track_id]) }}" class="media-left">
                                        <img src="{{ $playedTrack->track->album->image }}" height="64" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            @foreach ($playedTrack->track->artists as $artist)
                                                <a href="#">{{ $artist->name }}</a> {{ !$loop->last ? ',' : '' }}
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
        <br />
    </div>
</div>
<br />
@endsection