<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion cosplay" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-theater-masks"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard')?'active':'' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('member.area') }}">
            <i class="fas fa-fw fa-align-justify"></i>
            <span>Member Area</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
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
{{--    <li class="nav-item {{ request()->is('admin/class*')?'active':(request()->is('admin/section*')?'active':'') }}">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">--}}
{{--            <i class="fas fa-fw fa-table"></i>--}}
{{--            <span>Grade</span>--}}
{{--        </a>--}}
{{--        <div id="collapseThree" class="collapse {{ request()->is('admin/class*')?'show':(request()->is('admin/section*')?'show':'') }}" aria-labelledby="headingThree" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item {{ request()->is('admin/class*')?'active':'' }}" href="{{ route('admin.class.index') }}">Classes</a>--}}
{{--                <a class="collapse-item {{ request()->is('admin/section*')?'active':'' }}" href="{{ route('admin.section.index') }}">Sections</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ request()->is('admin/category*')?'active':(request()->is('admin/status*')?'active':'') }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-sliders-h"></i>
            <span>System</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ request()->is('admin/category*')?'show':(request()->is('admin/status*')?'show':'') }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/category*')?'active':'' }}" href="{{ route('admin.category.index') }}">Categories</a>
                <a class="collapse-item {{ request()->is('admin/status*')?'active':'' }}" href="{{ route('admin.status.index') }}">Status</a>
                <a class="collapse-item {{ request()->is('admin/questions*')?'active':'' }}" href="{{ route('admin.questions.index') }}">Questions Answers</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cosplay
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('admin/costume*')?'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-theater-masks"></i>
            <span>Costumes</span>
        </a>
        <div id="collapsePages" class="collapse {{ request()->is('admin/costume*')?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/costume*')?'active':'' }}" href="{{ route('admin.costume.index') }}">All</a>
                <a class="collapse-item {{ request()->is('admin/costume/d*')?'active':'' }}" href="{{ route('admin.delivered.index') }}">Delivered</a>
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
