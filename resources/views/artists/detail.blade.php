@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-head">
                    <div class="align-self-center halfway-fab text-center p-1">
                        <span class="avatar avatar-lg avatar-online rounded-circle">
                            <img src="{{ $artist->image }}" />
                        <span>
                    </div>
                    <div class="text-center">
                        {{ $artist->name }}
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-header">
                    <h5>Total Plays</h5>
                </div>
                <div class="card-body">
                    <h5 class="p-0"><strong>{{ $artist->getPlayCount() }}</strong></h5>
                </div>
            </div>
        </div>
        <br />
         <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-header">
                    <h5>Total Listening Time</h5>
                </div>
                <div class="card-body">
                    <h5 class="p-0"><strong>{{ $artist->getTotalListeningTime() }}</strong></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card custom-card tracks-card">
            <div class="card-head">
                <div class="card-header">
                    <div class="card-title">
                        Tracks from artists you've listened to
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="media-list">
                    @foreach ($artist->tracks as $track)
                        <div class="media">
                            <a href="{{ route('track', ['id' => $track->id]) }}" class="media-left">
                                <img src="{{ $track->album->image }}" height="64" />
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    @foreach ($track->artists as $artist)
                                       <strong>{{ $artist->name }}</strong> {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </h4>
                                <span class="track-name"><a href="{{ route('track', ['id' => $track->id]) }}">{{ $track->name }}</a></span>
                                <span class="float-right played-time badge badge-primary custom-time-bade">Total plays: {{ $track->getPlayCount() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection