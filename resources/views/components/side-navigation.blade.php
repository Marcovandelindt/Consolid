<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">
        {{ env('APP_NAME', 'Consolid') }}
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fas fa-home sidebar-icon"></i>
            <span class="item-name">Home</span>
        </a>
        <a href="{{ route('music') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fas fa-music sidebar-icon"></i>
            <span class="item-name">Music</span>
        </a>
        <a href="{{ route('journals.overview') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fas fa-book sidebar-icon"></i>
            <span class="item-name">Journal</span>
        </a>
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fas fa-running sidebar-icon"></i>
            <span class="item-name">Activity</span>
        </a>
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fas fa-calendar sidebar-icon"></i>
            <span class="item-name">To Do</span>
        </a>
        <a href="{{ route('building.bin') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fas fa-dumpster sidebar-icon"></i>
            <span class="item-name">Building Bin</span>
        </a>
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fas fa-newspaper sidebar-icon"></i>
            <span class="item-name">News</span>
        </a>
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fas fa-futbol sidebar-icon"></i>
            <span class="item-name">Football</span>
        </a>
        <a href="{{ route('weather') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fas fa-sun sidebar-icon"></i>
            <span class="item-name">Weather</span>
        </a>
    </div>
</div>
