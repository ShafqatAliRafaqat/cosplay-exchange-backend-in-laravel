<style type="text/css">
    .dropdown-item{
        line-height:30px;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-weight: 600;
    }
    .nav-link{
        color: black;
    }


.tb
{
    display: table;
    width: 100%;
}

.td
{
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

input, button
{
    color: #5a5c69;
    font-family: Nunito;
    padding: 0;
    margin: 0;
    border: none;
    outline: none;
    background-color: transparent;
}

#cover
{
   /* position: relative;
    top: 3px;
    left: -180px;

    */
    width: 70%;
    float: left !important;
    position: absolute;
    left: -30px;
    padding: 20px;
    background-color:#dddfeb ;  /*#ff7575;*/
    border-radius: 20px;
    /*box-shadow: 0 10px 40px #ff7c7c, 0 0 0 20px #ffffffeb;*/
    transform: scale(0.6);
}

form
{
    height: 40px;
}

input[type="text"]
{
    width: 100%;
    font-size: 30px;
}
.card-body input[type="text"]
{
    width: 100%;
    font-size: 18px;
}
.card-body input::-webkit-input-placeholder {
    font-size: 18px !important;
}

    @media screen and (min-width: 1200px) {
        #cover {
            display: block;
        }
        #cover_mobile{
            display: none;
        }
        input[type="text"]::placeholder
        {
            color: #5a5c69; /* #e16868;*/
            font-size: 30px;
            margin-bottom:10px;

        }
    }
    @media screen and (max-width: 1200px) {
        #cover {
            display: none;
        }
        #cover_mobile {
            display: block;
        }
    }


input#place::placeholder
        {
            color: #5a5c69; /* #e16868;*/
            font-size: 20px;
        }
input#place{
    height: 40px;
    font-size: 20px;
    width: 86%;
    display:inline-block;margin-right:5px;
}        

 @media screen and (max-width: 524px) {

    .hidedeskTopBar {display: none;}
    #sidebarToggleTop {display: none;}
    #accordionSidebar {display: none;}

    }

/*button
{
    display: block;
    font-size: 30px;

    float: right;
}
    */
</style>
<nav id="nav" class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button> -->
    <b class="nav-item dropdown no-arrow" >
        <a class="nav-link dropdown-toggle p-0"  href="#"  id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-1 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->profile->name==null?'':Auth::user()->profile->name }}</span>
            @if(Auth::user()->profile->img==null)
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
             @else
            <img class="img-profile rounded-circle top-bar-icon-img1" src="{{ asset('uploads/'.Auth::user()->profile->img) }}">
            @endif
        </a>

        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
        style="margin-top: -5px; width: 250px;" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('member.profile.edit',Auth::id()) }}">
               <!--  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> -->
               View Profile
            </a>
            <div class="dropdown-divider"></div>
            <p class="dropdown-header">Selling</p>
            <a class="dropdown-item" href="{{url('member/costume/create')}}">
              List an item
            </a>
            <a class="dropdown-item" href="{{url('member/costume')}}">
              My Listings
            </a>
            <a class="dropdown-item" href="{{url('member/area')}}">
               Seller Dashboard
            </a>
            <div class="dropdown-divider"></div>
            <p class="dropdown-header">Buying</p>
            <a class="dropdown-item" href="#">
              Favorites
            </a>
            <a class="dropdown-item" href="{{url('cosplay/cart')}}">
               My Purchases
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('/contact')}}">
               Help Center
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>
        </div>
    </b>


    <div id="cover" class="navbar-left">
      <form method="POST" action="{{route('searchCostumes')}}">
          @csrf
        <div class="tb">
          <div class="td"><input type="text" name="costume" placeholder="Search All Cosplays..." required></div>
          <div class="td">
            <button type="submit">
             <i  class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto" id="desk-TopBar">

        <!-- Nav Item - Alerts -->
        <li class="nav-item hidedeskTopBar"><a class="nav-link" href="#">Download app</a></li>
        <li class="nav-item"><a class="nav-link" href="#"></a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('member/forum')}}"><i class="fas fa-sticky-note fa-fw text-purple"></i></a></li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw text-purple"></i>
                <!-- Counter - Alerts -->
                @if(Auth::user()->unReadNotifications->count())
                <span class="badge badge-danger badge-counter">{{ Auth::user()->unReadNotifications->count() }}</span>
                @endif
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header cosplay">
                    Notifications
                </h6>
                    @foreach(Auth::user()->unReadNotifications as $unreadNotification)
                    <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary cosplay">
                            <i class="fas fa-bullhorn text-purple"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-bold text-danger">{{ $unreadNotification->data['notification'] }}</span>
                        <div class="small text-gray-500">{{ $unreadNotification->created_at->diffForHumans() }}</div>
                    </div>
                    </a>
                    @endforeach
                @foreach(Auth::user()->ReadNotifications->take(2) as $readnotification)
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary cosplay">
                                <i class="fas fa-bullhorn text-purple"></i>
                            </div>
                        </div>
                        <div>
                            <span class="font-weight-bold text-warning">{{ $readnotification->data['notification'] }}</span>
                            <div class="small text-gray-500">{{ $readnotification->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                @endforeach
                @if(Auth::user()->unReadNotifications->count())
                <a class="dropdown-item text-center small text-gray-500" href="{{ route('notification.mark-as-read') }}">Mark All Read</a>
                @endif
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('cosplay/cart')}}"><i class="fas fa-cart-plus fa-fw text-purple"></i></a></li>
        <li class="nav-item "><span class="nav-link"><a class="btn btn-sm" style="width: 60px; background-color: #3e1779; color: honeydew" href="{{url('member/costume/create')}}">Sell</a></span></li>
        <li class="nav-item "><span class="nav-link"><a class="btn btn-sm" style="width: 60px; background-color: #3e1779; color: honeydew" href="{{ route('cosplay.costume.index') }}">Shop</a></span></li>

        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

        <!-- Nav Item - User Information -->
       <!--  <li class="nav-item dropdown no-arrow" >
            <a class="nav-link dropdown-toggle"  href="#"  id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-1 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->profile->name==null?'':Auth::user()->profile->name }}</span>
                @if(Auth::user()->profile->img==null)
                    <img class="img-profile rounded-circle top-bar-icon-img" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                 @else
                <img class="img-profile rounded-circle top-bar-icon-img" src="{{ asset('uploads/'.Auth::user()->profile->img) }}">
                @endif
            </a>

            <!-- Dropdown - User Information --
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            style="margin-top: -5px; width: 250px;" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('member.profile.edit',Auth::id()) }}">
                   <!--  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> --
                   View Profile
                </a>
                <div class="dropdown-divider"></div>
                <p class="dropdown-header">Selling</p>
                <a class="dropdown-item" href="{{url('member/costume/create')}}">
                  List an item
                </a>
                <a class="dropdown-item" href="{{url('member/costume')}}">
                  My Listings
                </a>
                <a class="dropdown-item" href="{{url('member/area')}}">
                   Seller Dashboard
                </a>
                <div class="dropdown-divider"></div>
                <p class="dropdown-header">Buying</p>
                <a class="dropdown-item" href="#">
                  Favorites
                </a>
                <a class="dropdown-item" href="{{url('cosplay/cart')}}">
                   My Purchases
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('/contact')}}">
                   Help Center
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
            </div>
        </li> -->
    </ul>
</nav>
<div id="cover_mobile" style="margin-top: -10px; padding-bottom: 30px;">
      <form method="POST" action="{{route('searchCostumes')}}">
          @csrf
        <div class="form-group">
            <input id="place" type="text" class="form-control form-control-user" name="costume" placeholder="Search for Costumes here" required>
            <button style="width: 10%; display:inline-block;" type="submit"><i  class="fas fa-search fa-fw"></i></button>
        </div>
      </form>
</div>

<div class="clear"></div>
