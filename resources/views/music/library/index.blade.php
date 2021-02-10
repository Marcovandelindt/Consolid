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

<!-- Statistics Row -->
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
<!-- /Statistics Row -->

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs" id="musicTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="plays-tab" href="{{ route('music.library') }}" role="tab" aria-selected="{{ ($requestType == 'library' ? 'true' : 'false') }}">
                    <i class="fas fa-clock"></i> Plays
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tracks-tab" href="{{ route('music.library.tracks') }}" role="tab" aria-selected="{{ $requestType == 'tracks' ? 'true' : 'false' }}">
                    <i class="fas fa-music"></i> Tracks
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="artists-tab" href="#artists" role="tab" aria-selected="false">
                    <i class="fas fa-star"></i> Artists
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="albums-tab" href="#albums" role="tab" aria-selected="false">
                    <i class="fas fa-compact-disc"></i> Albums
                </a>
            </li>
        </ul>

        <!-- Changeable Content -->
        <div class="tab-content" id="musicTabContent">

            <!-- /Plays Tab Content -->
            <div class="tab-pane fade show active pt-3 pl-1" id="plays" role="tabpanel" aria-labelledby="plays-tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class="statistics-data">
                            <div class="total-plays mr-5">
                                <h5 class="data-heading">Total Plays</h5>
                                <p class="data-statistic">{{ count($tracks) }}</p>
                            </div>
                            <div class="average-plays">
                                <h5 class="data-heading">Average Plays Per Day</h5>
                                <p class="data-statistic">{{ $averagePlaysPerDay }}</h5>
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
                                                <a href="{{ route('track', ['id' => $playedTrack->track_id]) }}">
                                                    {{ $playedTrack->track->name }}
                                                </a>
                                            </div>
                                            <div class="artist-names">
                                                @foreach ($playedTrack->track->artists as $artist)
                                                    <a href="{{ route('artist', ['id' => $artist->id]) }}">
                                                        {{ $artist->name }}
                                                    </a>
                                                    {{ !$loop->last ? ',' : '' }}
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
                            <div class="pagination">
                                {{ $paginatedPlayedTracks->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5><strong>Listening History</strong></h5>
                        <canvas id="yearlyPlaysChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- /Plays Tab Content -->

            <!-- Artists Tab Content -->
            <div class="tab-pane fade pt-3 pl-1" id="artists" role="tabpanel" aria-labelledby="artists-tab">
                Artists
            </div>
            <!-- /Artists Tab Content -->

            <!-- Albums Tab Content -->
            <div class="tab-pane fade pt-3 pl-1" id="albums" role="tabpanel" aria-labelledby="albums-tab">
                Albums
            </div>
            <!-- /Albums Tab Content -->

        </div>
        <!--/Changeable Content -->
    </div>
</div>

<script type="text/javascript">

    // Yearly Plays Chart
    var ctxYearly    = document.getElementById('yearlyPlaysChart');
    ctxYearly.height = 200;

    var yearlyPlaysChart = new Chart(ctxYearly, {
        type: 'bar',
        data: {
            labels: ['2021'],
            datasets: [{
                label: 'Played Tracks',
                data: [
                    @foreach ($yearlyTrackCount as $item => $count)
                        {{ count($count) }},
                    @endforeach
                ],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            },
            onClick: function(c, i) {
                e = i[0];
                redirectToYear(this.data.labels[e._index]);
            }
        }
    });

    function redirectToYear(year) {
        var redirectLink = "{{ route('music.library') }}";
        window.location.href = redirectLink + "?from=01-01-" + year + "&range=year";
    }

</script>
@endsection 