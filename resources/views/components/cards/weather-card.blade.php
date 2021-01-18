<div class="card custom-card weather-card">
    <div class="card-content">
        <div class="card-body">
            <div class="media d-flex">
                <div class="media-body text-white text-left align-self-bottom mt-3">
                    <h5 class="d-block mb-1 font-medium-1">{{ $weather->condition_text }}</h5>
                    <h1 class="text-white mb-0">{{ $weather->temperature }} <sup>o</sup>C</h1>
                    <i>But feels like: {{ $weather->feels_like }} <sup>o</sup>C</i>
                </div>
                <div class="align-self-top">
                    <i class="float-right icon">
                        <img src="{{ $weather->condition_icon }}" /><br />
                    </i>
                </div>
            </div>
        </div>
    </div>
</div>