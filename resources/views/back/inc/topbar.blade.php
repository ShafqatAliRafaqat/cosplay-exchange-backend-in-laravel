<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
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
                            <i class="fas fa-bullhorn text-white"></i>
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
                            <div class="icon-circle bg-primary" style="background-color: #D324CB !important">
                                <i class="fas fa-bullhorn text-white"></i>
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

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><strong>{{ Auth::user()->profile->name==null?'Admin':Auth::user()->profile->name }}</strong></span>
                <i class="fas fa-user"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('member.area') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Member Area
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
