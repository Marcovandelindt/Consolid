<ul class="nav nav-tabs" id="musicTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ $requestType == 'library' ? 'active' : '' }}" id="plays-tab" href="{{ route('music.library') }}" role="tab" aria-selected="{{ ($requestType == 'library' ? 'true' : 'false') }}">
            <i class="fas fa-clock"></i> Plays
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $requestType == 'tracks' ? 'active' : '' }}" id="tracks-tab" href="{{ route('music.library.tracks') }}" role="tab" aria-selected="{{ ($requestType == 'tracks' ? 'true' : 'false') }}">
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