@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-xs-12">
        <div class="card custom-card">
            <div class="card-head">
                <div class="align-self-center halfway-fab text-center p-1">
                    <span class="avatar avatar-lg avatar-online rounded-circle">
                        <img src="{{ $track->album->image }}" />
                    <span>
                </div>
                <div class="text-center">
                    @foreach ($track->artists as $artist)
                        <a href="#">{{ $artist->name }}</a> {{ !$loop->last ? ',' : '' }}
                    @endforeach
                    <br />
                    <span>{{ $track->name }}</span>
                </div>
            </div>
            <div class="card-body text-center">
                <p><strong>Total Plays: {{ $track->getPlayCount() }}</strong></p>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card custom-card tracks-card">
            <div class="card-head">
                <div class="card-header">
                    <div class="card-title">
                        Listening History
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="media-list">
                    @foreach ($track->played as $playedTrack)
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
                                <span class="float-right played-time badge badge-primary custom-time-bade">{{ date('Y-m-d H:i', ($playedTrack->played_at + 60 * 60)) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection