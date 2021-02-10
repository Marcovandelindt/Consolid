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
    <div class="col-md-12">
        @include('components.library-tabs')

		 <!-- Tracks Tab Content -->
		<div class="tab-content" id="musicTabContent">
			<div class="tab-pane fade show active pt-3 pl-1" id="tracks" role="tabpanel" aria-labelledby="tracks-tab">
				<div class="row">
                    <div class="col-md-6">
                        <div class="statistics-data">
                            <div class="total-plays mr-5">
                                <h5 class="data-heading">Unique Tracks Played</h5>
                                <p class="data-statistic">{{ count($uniqueTracks) }}</p>
                            </div>
						</div>

						<div class="played-tracks-data">
                            <div class="media-list">
                                @if (!empty($uniqueTracksPaginated))
                                    @foreach ($uniqueTracksPaginated as $uniqueTrack)
                                        <div class="media flexed-media">
                                            <div class="track-image">
                                                <img src="{{ $uniqueTrack->track->album->image }}" height="32" />
                                            </div>
                                            <div class="track-name">
                                                <a href="{{ route('track', ['id' => $uniqueTrack->track_id]) }}">
                                                    {{ $uniqueTrack->track->name }}
                                                </a>
                                            </div>
                                            <div class="artist-names">
                                                @foreach ($uniqueTrack->track->artists as $artist)
                                                    <a href="{{ route('artist', ['id' => $artist->id]) }}">
                                                        {{ $artist->name }}
                                                    </a>
                                                    {{ !$loop->last ? ',' : '' }}
                                                @endforeach
                                            </div>
                                            <div class="played-time">
                                                <span class="badge badge-primary custom-time-bade">{{ $uniqueTrack->total }} Plays</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <br />
                            <div class="pagination">
                                {{ $uniqueTracksPaginated->links() }}
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Tracks Tab Content -->
    </div>
</div>

@endsection