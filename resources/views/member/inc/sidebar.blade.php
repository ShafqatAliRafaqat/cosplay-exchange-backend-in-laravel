<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion cosplay" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-theater-masks"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cosplay Exchange</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
   <!--  <li class="nav-item {{ request()->is('member/area')?'active':'' }}">
        <a class="nav-link" href="{{ route('member.area') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> -->

   @if(Auth::user()->role_id<4)
        <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-align-justify"></i>
            <span>Admin Panel</span></a>
    </li>
    @endif
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{ url('home/index') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Homepage</span></a>
    </li> -->
   <li class="nav-item {{ request()->is('member/area')?'active':'' }}">
        <a class="nav-link" href="{{ route('member.area') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cosplay.costume.index') }}">
            <i class="fas fa-fw fa-mask"></i>
            <span>Shop</span></a> <!-- Costumes -->
    </li>
    <li class="nav-item {{ request()->is('member/member-area')?'active':'' }}">
        <a class="nav-link" href="{{ route('member.memberArea') }}">
            <i class="fas fa-user fa-sm fa-fw"></i>
            <span>Members Area</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Cosplay
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
{{--
    <li class="nav-item {{ request()->is('admin/user*')?'active':(request()->is('admin/role*')?'active':'') }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse {{ request()->is('admin/user*')?'show':(request()->is('admin/role*')?'show':'') }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/user*')?'active':'' }}" href="{{ route('admin.user.index') }}">Users</a>
                <a class="collapse-item {{ request()->is('admin/role*')?'active':'' }}" href="{{ route('admin.role.index') }}">Roles</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ request()->is('admin/class*')?'active':(request()->is('admin/section*')?'active':'') }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-table"></i>
            <span>Grade</span>
        </a>
        <div id="collapseThree" class="collapse {{ request()->is('admin/class*')?'show':(request()->is('admin/section*')?'show':'') }}" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/class*')?'active':'' }}" href="{{ route('admin.class.index') }}">Classes</a>
                <a class="collapse-item {{ request()->is('admin/section*')?'active':'' }}" href="{{ route('admin.section.index') }}">Sections</a>
            </div>
        </div>
    </li>
--}}
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ request()->is('member/costume*')?'active':(request()->is('cosplay/question*')?'active':'') }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-theater-masks"></i>
            <span>Notifications</span> <!-- Exchange -->
        </a>
        <div id="collapseUtilities" class="collapse {{ request()->is('member/costume*')?'show':(request()->is('cosplay/question*')?'show':'') }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('member/costume*')?'active':'' }}" href="{{ route('member.costume.index') }}">My Posts</a> <!-- Costumes -->
                <a class="collapse-item {{ request()->is('cosplay/question*')?'active':'' }}" href="{{ route('cosplay.question.index') }}">Requests</a> <!-- Queries -->
                <a class="collapse-item {{ request()->is('cosplay/request*')?'active':'' }}" href="{{ route('cosplay.request.index') }}">Awaiting Admin Approval</a> <!-- Sent Requests -->
            </div>
        </div>

    </li>
    <li class="nav-item {{ request()->is('member/costume*')?'active':'' }}">
        <a class="nav-link" href="{{ route('member.costume.create') }}">
            <i class="fas fa-fw fa-mask"></i>
            <span>Post</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item {{ request()->is('member/coin*')?'active':'' }}">
        <a class="nav-link" href="{{ route('member.coin.index') }}">
            <i class="fas fa-fw fa-coins"></i>
            <span>Cosplay Coins</span></a> <!-- Coins -->
    </li>
    <li class="nav-item {{ request()->is('member/subscription*')?'active':'' }}">
        <a class="nav-link" href="{{ route('member.subscription.index') }}">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Subscription</span></a>
    </li>

    <li class="nav-item {{ request()->is('member/profile*')?'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-user fa-sm fa-fw"></i>
            <span>Profile</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if(Auth::user()->profile->complete==0)
                    <a class="collapse-item {{ request()->is('member/profile/create*')?'active':'' }}" href="{{ route('member.profile.create') }}">Create Profile</a>
                @else
                    <a class="collapse-item {{ request()->is('member/profile/*')?'active':'' }}" href="{{ route('member.profile.edit',Auth::user()->profile) }}">Edit Profile</a>
                    <a class="collapse-item {{ request()->is('member/profilearea/up-email')?'active':'' }}" href="{{ route('member.area.edit.email') }}">Change Email</a>
                    <a class="collapse-item {{ request()->is('member/profilearea/up-password')?'active':'' }}" href="{{ route('member.area.edit.password') }}">Change Password</a>
                @endif
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
