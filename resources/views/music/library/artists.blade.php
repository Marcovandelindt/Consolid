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
                                <h5 class="data-heading">Unique Artists Played</h5>
                                <p class="data-statistic"</p>
                            </div>
						</div>

						<div class="played-tracks-data">
                            <div class="media-list">
                               @if (!empty($artistsPaginated))
                                    @foreach ($artistsPaginated as $artist)
                                        <div class="media flexed-media">
                                            <div class="artist-image">
                                                <img src="{{ $artist->image }}" height="32" />
                                            </div>
                                            <div class="artist-name">
                                                <a href="{{ route('artist', ['id' => $artist->id]) }}">
                                                    {{ $artist->name }}
                                                </a>
                                            </div>
                                            <div class="artist-plays">
                                                {{ $artist->total }} Plays
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <br />
                            <div class="pagination">
                                {{ $artistsPaginated->links() }}
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