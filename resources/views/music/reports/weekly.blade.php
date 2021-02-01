@extends('layouts.app')

@section('content')
<h1>{{ $title }} | {{ $startDateFormatted }} - {{ $endDateFormatted }}</h1>
<hr />

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

<br />

@endsection