@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        @include('components.cards.weather-card')
    </div>
</div>
@endsection