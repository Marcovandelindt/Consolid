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

<!-- Statistic Cards -->
<div class="row">
    <div class="col-md-3">
        @include('components.cards.spotify-card')
    </div>
    <div class="col-md-3">
        @include('components.cards.album-card')
    </div>
    <div class="col-md-3">
        @include('components.cards.artist-card')
    </div>
    <div class="col-md-3">
        @include('components.cards.listening-time-card')    
    </div>
</div>
<!-- /Statistic cards -->

<br />

<!-- Changeable content based on tabs -->
<div class="row">
    <div class="col-md-12">
        <div class="changeable-content">
            <ul class="nav nav-tabs" id="musicTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="plays-tab" data-toggle="tab" href="#plays" role="tab" aria-selected="true">Plays</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tracks-tab" data-toggle="tab" href="#tracks" role="tab" aria-selected="false">Tracks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="artists-tab" data-toggle="tab" href="#artists" role="tab" aria-selected="false">Artists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="albums-tab" data-toggle="tab" href="#albums" role="tab" aria-selected="false">Albums</a>
                </li>
            </ul>
            <div class="tab-content" id="musicTabContent">
                <div class="tab-pane fade show active pt-3 pl-1" id="plays" role="tabpanel" aria-labelledby="plays-tab">
                   <div class="row">
                        <div class="col-md-6">
                            <div class="panel-statistics-data">
                                <div class="total-plays mr-5">
                                        <h5 class="data-item-heading">Total Plays</h5>
                                        <p class="data-item-statistic">{{ count($tracks) }}</p>
                                </div>
                                <div class="total-plays">
                                        <h5 class="data-item-heading">Average Plays Per Day</h5>
                                        <p class="data-item-statistic">{{ $averagePlays }}</p>
                                </div>
                            </div>
                            <div class="played-tracks-data">
                                <div class="media-list">
                                    @if (!empty($paginatedPlayedTracks))
                                        @foreach ($paginatedPlayedTracks as $playedTrack)
                                            <div class="media flexed-media">
                                                <div class="track-image">
                                                    <img src="{{ $playedTrack->track->album->image }}" height="32" />
                                                </div>
                                                <div class="track-name">
                                                    <a href="{{ route('track', ['id' => $playedTrack->track_id]) }}">{{ $playedTrack->track->name }}</a>
                                                </div>
                                                <div class="artist-names">
                                                    @foreach ($playedTrack->track->artists as $artist)
                                                        <a href="{{ route('artist', ['id' => $artist->id]) }}">{{ $artist->name }}</a> {{ !$loop->last ? ',' : '' }}
                                                    @endforeach
                                                </div>
                                                <div class="played-time">
                                                    {{ date('d M H:i', ($playedTrack->played_at + 60 * 60)) }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <br />
                                <div class="tracks-pagination">
                                    {{ $paginatedPlayedTracks->links() }}
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="tab-pane fade p-2" id="tracks" role="tabpanel" aria-labelledby="tracks-tab">
                    Tracks
                </div>
                <div class="tab-pane fade p-2" id="artists" role="tabpanel" aria-labelledby="artists-tab">
                    Artists
                </div>
                <div class="tab-pane fade p-2" id="albums" role="tabpanel" aria-labelledby="albums-tab">
                    Albums
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Changeable content based on tabs -->

@endsection