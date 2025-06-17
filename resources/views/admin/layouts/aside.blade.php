<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">

                {{--                <img src="{{ asset("storage/uploads/" . $settings["SETTING_SITE_LOGO"]) }}" class="w-75" alt="">--}}
                {{--            --}}
            </div>
            <h6 class="sidebar-brand-text mx-3 mt-2 font-weight-bold" title="JA IT SOLUTION">jaisbd.com</h6>
        </a>
    </li>


    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>



    <li class="nav-item {{
    request()->routeIs("sliders.index") ||
    request()->routeIs("sliders.create") ||
    request()->routeIs("sliders.show") ||
    request()->routeIs("sliders.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("sliders.index") }}">
            <i class="fas fa-fw fa-tablet"></i>
            <span>Sliders</span>
        </a>
    </li>

{{--


    <li class="nav-item ">
        <a class="nav-link" href="{{route('role.index')}}">
            <i class="fas fa-id-badge"></i>
            <span> Role</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{route('assignrole.index')}}">
            <i class="fas fa-user-check"></i>
            <span>Assign Role</span>
        </a>
    </li> --}}



</ul>
