<nav class="navbar navbar-expand-lg p-0">
    <div class="logo my-3 my-md-0">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('front/img/logo_final.png') }}" alt="logo image" class="img-fluid" style="width: 155px;height: 70px;">
        </a>
    </div>

    <button class="navbar-toggler d-block d-md-none pr-0 ml-auto mr-3 collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar bg-theme top-bar"></span>
        <span class="icon-bar bg-theme middle-bar"></span>
        <span class="icon-bar bg-theme bottom-bar"></span>
    </button>

    <div class="collapse navbar-collapse menu-items-position d-md-block" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto text-uppercase">
            <li class="nav-item">
                <a class="nav-link pl-md-0" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cosplay.costume.index') }}">Costumes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('faq') }}">Questions & Answers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('member.forum.index') }}">USA Cons</a>
            </li>
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link pl-md-0" href="{{ route('member.area') }}">Member Area</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-md-0" href="{{ route('cosplay.cart.index') }}">Cart <small class="text-danger">( {{Cart::instance('shopping')->content()->count()}} )</small></a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link pl-md-0">Wishlist</a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link pl-md-0" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link pl-md-0" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-md-0" href="{{ route('register') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
