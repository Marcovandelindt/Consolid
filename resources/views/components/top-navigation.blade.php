<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" id="top-navigation">
    <button class="btn btn-primary" id="sidebar-toggle">Toggle Sidebar</button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nbavbarLinkList" aria-controls="navbarLinkList" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarLinkList">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @auth
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" class="nav-link"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Logout') }}
                    <a>
                </form>
            <li>
            @endauth
        </ul>
    </div>
</nav>