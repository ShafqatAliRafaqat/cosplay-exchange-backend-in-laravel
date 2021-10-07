<div class="bg-dark">
    <img class="img-fluid" style="width: 100%; "  src="{{ asset('images/top-banner.jpg') }}" alt="top-banner">
</div>
<div class="container-fluid d-flex justify-content-between align-items-center mt-4">
    <a class="h2 d-flex align-items-center justify-content-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
             class="mr-1 bi bi-plus-square"
             viewBox="0 0 16 16">
            <path
                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        <span>Add</span>
    </a>
    <h4 class="font-weight-bold">RESOURCES</h4>
    <div class="d-flex align-items-center">
        <div class="input-group input-group">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                   aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary btn-sm" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
        <img src="https://via.placeholder.com/150" height="40px" width="40px" class="glow rounded-circle ml-4" alt="imageplacehodler">
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto align-self-end">
                <li class="nav-item h5 border-right border-dark">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{url('/resource')}}">USA
                        Conventions
                    </a>
                </li>
                <li class="nav-item h5 border-right border-left border-dark">
                    <a class="nav-link {{ request()->is('cosplayer-award') ? 'active' : '' }}" href="{{url('/resource/cosplayer-award')}}">USA
                        Cosplayer Awards
                    </a>
                </li>

                <li class="nav-item h5 border-right border-left border-dark">
                    <a class="nav-link {{ request()->is('cosplayer-groups') ? 'active' : '' }}"
                       href="{{url('/resource/cosplayer-groups')}}">USA Cosplayer Groups
                    </a>
                </li>

                <li class="nav-item h5 border-right border-left border-dark">
                    <a class="nav-link {{ request()->is('commissioners') ? 'active' : '' }}" href="{{url('/resource/commissioners')}}">USA
                        Commissioners
                    </a>
                </li>

                <li class="nav-item h5 border-left border-dark">
                    <a class="nav-link {{ request()->is('photography-videography') ? 'active' : '' }}"
                       href="{{url('/resource/photography-videography')}}">Cosplayer Photogrpahy/ Viedography
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav > li > a {
        padding: 0;
        margin: 0;
        vertical-align: bottom;
        font-variant: small-caps;
    }

    .navbar-light .navbar-nav .nav-link {
        color: rgba(0, 0, 0, 1);
    }

    .navbar-light .navbar-nav .nav-link.active {
        text-decoration: underline;
    }
</style>
