@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-heading">
                <h1>{{ $title }}</h1>
                <hr />
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-info">
                <p>This section of the panel is used to store some reusable components / code. This can be components which can be used in the frontend, but also contains PHP Code which can be used in the backend. Besides that, there is also a page with some general info regarding some topics which I find interesting and I can use in my future projects!</p>
            </div>
        </div>
    </div>

    <br />

    <div class="row">
        <div class="col-4">
            <div class="section-button">
                <a class="btn custom-btn" href="{{ route('building.bin.frontend') }}">Frontend Components</a>
            </div>
        </div>
        <div class="col-4">
            <div class="section-button">
                <a class="btn custom-btn" href="{{ route('building.bin.backend') }}">Backend Code</a>
            </div>
        </div>
        <div class="col-4">
            <div class="section-button">
                <a class="btn custom-btn" href="{{ route('building.bin.information') }}">General Information</a>
            </div>
        </div>
    </div>
</div>
@endsection
