@extends('layouts.app')

@section('content')
<h2 class="text-center">{{ $title }} | {{ $startDateFormatted }} - {{ $endDateFormatted }}</h2>
<hr />

<div class="report-section">
    <div class="row">
        <div class="col-md-4">
            <div class="card top-item-card">
                @foreach ($weeklyReportData['topTracks'] as $topTrack)
                    @if ($loop->first)
                        <img class="card-img-top" src="{{ $topTrack->album->image }}" alt="{{ $topTrack->name }}">
                        <div class="card-body top-text">
                            <h5 class="card-title text-center"><strong><a href="{{ route('track', ['id' => $topTrack->id]) }}" class="default-link">{{ $topTrack->name }}</a></strong></h5>
                            <p class="text-center">
                                <i>
                                    @foreach ($topTrack->artists as $artist)
                                        <a href="{{ route('artist', ['id' => $artist->id]) }}" class="default-link text-underline">{{ $artist->name }}</a> {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </i>
                            </p>
                            <p class="text-center">{{ $topTrack->name }} was your most played track this week with a total of <strong class="text-underline">{{ $topTrack->total }}</strong> plays!</p>
                        </div>
                    @else
                        <li class="list-group-item">
                            <a href="{{ route('track', ['id' => $topTrack->id]) }}" class="default-link text-underline">{{ $topTrack->name }}</a> <i class="float-right">{{ $topTrack->total }} plays</i>
                        </li>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <div class="card top-item-card">
                @foreach ($weeklyReportData['topArtists'] as $topArtist)
                    @if ($loop->first)
                        <img class="card-img-top" src="{{ $topArtist->image }}" alt="{{ $topArtist->name }}">
                        <div class="card-body top-text">
                            <h5 class="card-title text-center"><strong><a href="{{ route('artist', ['id' => $topArtist->id]) }}" class="default-link">{{ $topArtist->name }}</a></strong></h5>
                            <div class="vertically-center">
                                <p class="text-center">{{ $topArtist->name }} was your most played artist this week with a total of <strong class="text-underline">{{ $topArtist->total }}</strong> plays!</p>
                            </div>
                        </div>
                    @else
                        <li class="list-group-item">
                            <a href="{{ route('artist', ['id' => $topArtist->id]) }}" class="default-link text-underline">{{ $topArtist->name }}</a> <i class="float-right">{{ $topArtist->total }} plays</i>
                        </li>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <div class="card top-item-card">
                @foreach ($weeklyReportData['topAlbums'] as $topAlbum)
                    @if ($loop->first)
                        <img class="card-img-top" src="{{ $topAlbum->image }}" alt="{{ $topAlbum->name }}">
                        <div class="card-body top-text">
                            <h5 class="card-title text-center"><strong><a href="#" class="default-link">{{ $topAlbum->name }}</a></strong></h5>
                            <p class="text-center">{{ $topAlbum->name }} was your most played album this week with a total of <strong class="text-underline">{{ $topAlbum->total }}</strong> plays!</p>
                        </div>
                    @else
                        <li class="list-group-item">
                            <a href="#" class="default-link text-underline">{{ $topAlbum->name }}</a> <i class="float-right">{{ $topAlbum->total }} plays</i>
                        </li>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<br />

<div class="report-section">
    <div class="row">
        <div class="col-md-12">
            <h2 class="section-heading text-center">Highlights</h2>
            <hr />
        </div>

        <div class="col-md-4">
            <div class="card mb-3 text-center">
                <div class="card-header">Total Plays</div>
                <div class="card-body">
                    <h5 class="card-title">{{ count($totalPlayedTracks) }} Plays</h5>
                    <i>vs. {{ count($totalPlayedTracksLastWeek) }} (last week)</i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 text-center">
                <div class="card-header">Average plays per day</div>
                <div class="card-body">
                    <h5 class="card-title">{{ round(count($totalPlayedTracks) / 7) }}</h5>
                    <i>vs. {{ round(count($totalPlayedTracksLastWeek) / 7) }} (last week)</i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 text-center">
                <div class="card-header">Total Time Listened</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalListeningTime }}</h5>
                    <i>vs. {{ $totalListeningTimeLastWeek }} (last week)</i>
                </div>
            </div>
        </div>
    </div>  
</div>

<div class="report-section">
    <div class="row">
        <div class="col-md-12">
            <h2 class="section-heading text-center">Which hours were the most active?</h2>
            <hr />
        </div>

        <div class="col-md-12">
            <canvas id="timeChart" height="600" style="height: 600px;"></canvas>
        </div>
    </div>
</div>

<br />

<script type="text/javascript">
    var ctx = document.getElementById('timeChart');
    ctx.height = 600;

    var timeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'],
            datasets: [{
                label: 'Total Played Tracks',
                data: [
                    @foreach ($trackCountPerTimeLastWeek as $time => $trackCount)
                        {{ count($trackCount) . ', ' }}
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(249, 122, 95, 0.5)'
                ]
            }]
        }, 
        options: {
            maintainAspectRatio: false,
        }
    });
</script>

@endsection